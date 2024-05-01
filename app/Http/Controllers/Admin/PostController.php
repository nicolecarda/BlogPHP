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

    public function __construct()   //Middleware can establishes which user con access to the each post view  
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create','store');
        $this->middleware('can:admin.posts.edit')->only('edit','update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    use AuthorizesRequests;
    public function index()  //Index recovers all the information of the categories and show it in the view
    {
        $posts = Post::all();

        return view('admin.posts.index', compact ('posts'));
    }

    public function create() //Create recovers the categories and tags information, then returns it in the create view
        {
            $categories = Category::all(); // All method shows the categories as objects in order to access their ID in the view
            $tags = Tag::all(); //relationship established in the model
            return view('admin.posts.create', compact('categories', 'tags'));
        }

    
        public function store(PostRequest $request) //store recovers all the info from posts; and redirects the user to edit view
        {
           
            $post = Post::create($request->all());

            if($request->file('file')){  //the if sentence evaluates if the users chooses an image for the post
                $url = Storage::put('posts', $request->file('file'));

                $post->image()->create([ 
                    'url'=> $url

                ]);
            }

            Cache::flush(); //clears the stored cache and let the user create or modify a post

            if ($request->has('tag_id') && !empty($request->tag_id)) { //realtionship between posts and tags
                // Attach the tags to the post
                $post->tags()->attach($request->tag_id);
            }
              
            
            return redirect()->route('admin.posts.edit', $post)->with('info', 'The post was created ok'); //if the post was created ok a message is shown
        }
        

    
    public function edit(Post $post)  //edit returns edit view
    {
        $this->authorize('author',$post); //authorize method checks if the user has the permissions for editing the post

        $categories = Category::all(); //it recovers all the categories and tags information
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    
    public function update(PostRequest $request, Post $post) //update recovers all the information from posts, and redirects the user to the edit view; if the post is updated ok a message is shown
    {

        $this->authorize('author',$post); //authorize method checks if the user has the permissions for updating the post

         $post->update($request->all());

         if($request-> file('file')){ //the if sentence evaluates if the users chooses an image for the post and update it

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
            $post->tags()->sync($request->tag_id);  //method sync assures tags are not repeated, but replaced
        }
           
        Cache::flush(); //flush method clears the stored cache
        
         return redirect()->route('admin.posts.edit', $post)->with('info', 'The post was updated ok');
    }

  
    public function destroy(Post $post) //destroy calls the delete method and redirects the user to the indx view; if the category is deleted ok a message is shown
    {

        $this->authorize('author',$post); //authorize method checks if the user has the permissions for deleting the post
        
        $post->delete();

        Cache::flush(); //flush method clears the stored cache

        return redirect()->route('admin.posts.index')->with('info', 'The post was deleted ok');
    
    }
}
