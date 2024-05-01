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
    public function index(){ //index recovers info from posts, paginate the list of posts, and returns the index view

        if(request()->page){   //for showing the cache of each page
            $key = "posts" . request()->page;
        }else{
            $key = "posts";
        }

        if(Cache::has($key)){
            $posts = Cache::get($key);
        }else{
            $posts = Post::where('status', 2)->latest('id') ->paginate(8);  //if there's no stored cache, the info is recovered from the BD
            Cache::put($key,$posts);
        };
       
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){  //show checks if the post has the published status, paginates the published posts list and returns the show view

        $this->authorize('published', $post);

        $similar = Post::where('category_id', $post->category_id)
                        ->where('status', 2)
                        ->where('id', '!=', $post->id)
                        ->latest('id')
                        ->take(4)
                        ->get();

        return view('posts.show', compact('post', 'similar'));

    }

    public function category(Category $category){  //category recovers the relationship with published posts and then returns the posts category view

        $posts = Post::where('category_id', $category->id)
                    ->where('status', 2)
                    ->latest('id')
                    ->paginate(6);

        return view('posts.category', compact('posts', 'category'));                        

    }

    public function tag(Tag $tag){ //tag recovers the relationship with published posts and returns the posts tag view

        $posts = $tag->posts()
                    ->where('status', 2)
                    ->latest('id')
                    ->paginate(6);

        return view('posts.tag', compact('posts', 'tag'));                        

    }
}
