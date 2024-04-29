<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{

    use AuthorizesRequests;
    public function index(){

        if(request()->page){   //para que se muestre la cache de cada pagina
            $key = "posts" . request()->page;
        }else{
            $key = "posts";
        }

        if(Cache::has($key)){
            $posts = Cache::get($key);
        }else{
            $posts = Post::where('status', 2)->latest('id') ->paginate(8);  //si no hay almacenada cache, se realiza la consulta a la BD
            Cache::put($key,$posts);
        };
       
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){

        $this->authorize('published', $post);

        $similar = Post::where('category_id', $post->category_id)
                        ->where('status', 2)
                        ->where('id', '!=', $post->id)
                        ->latest('id')
                        ->take(4)
                        ->get();

        return view('posts.show', compact('post', 'similar'));

    }

    public function category(Category $category){

        $posts = Post::where('category_id', $category->id)
                    ->where('status', 2)
                    ->latest('id')
                    ->paginate(6);

        return view('posts.category', compact('posts', 'category'));                        

    }

    public function tag(Tag $tag){

        $posts = $tag->posts()
                    ->where('status', 2)
                    ->latest('id')
                    ->paginate(6);

        return view('posts.tag', compact('posts', 'tag'));                        

    }
}
