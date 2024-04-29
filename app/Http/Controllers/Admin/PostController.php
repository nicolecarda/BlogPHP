<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create','store');
        $this->middleware('can:admin.posts.edit')->only('edit','update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    use AuthorizesRequests;
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact ('posts'));
    }

    public function create()
        {
            $categories = Category::all(); //El metodo all pasa las categories como objetos para poder acceder al id en la vista
            $tags = Tag::all();
            return view('admin.posts.create', compact('categories', 'tags'));
        }

    
        public function store(PostRequest $request)
        {
           
            $post = Post::create($request->all());

            if($request->file('file')){
                $url = Storage::put('posts', $request->file('file'));

                $post->image()->create([ 
                    'url'=> $url

                ]);
            }

            Cache::flush(); //para borrar la cache almacenada y poder crear o modificar un post

            if ($request->has('tag_id') && !empty($request->tag_id)) {
                // Attach the tags to the post
                $post->tags()->attach($request->tag_id);
            }
              
            
            return redirect()->route('admin.posts.edit', $post)->with('info', 'The post was created ok');
        }
        

    
    public function edit(Post $post)
    {
        $this->authorize('author',$post);

        $categories = Category::all(); //El metodo all pasa las categories como objetos para poder acceder al id en la vista
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    
    public function update(PostRequest $request, Post $post)
    {

        $this->authorize('author',$post);

         $post->update($request->all());

         if($request-> file('file')){

            $url = Storage::put('posts', $request-> file('file'));

            if($post->image){
                Storage::delete($post->image->url);
                $post->image->update([ 
                    'url' => $url
                ]);

            }else{

                $post->image()->create([ 
                    'url' => $url
                ]);
            }
        }

        if ($request->has('tag_id') && !empty($request->tag_id)) {
            // Attach the tags to the post
            $post->tags()->sync($request->tag_id);  //para que no se repitan las tags, sino que se reemplacen
        }
          
        Cache::flush(); 
        
         return redirect()->route('admin.posts.edit', $post)->with('info', 'The post was updated ok');
    }

  
    public function destroy(Post $post)
    {

        $this->authorize('author',$post);
        
        $post->delete();

        Cache::flush(); 

        return redirect()->route('admin.posts.index')->with('info', 'The post was deleted ok');
    
    }
}
