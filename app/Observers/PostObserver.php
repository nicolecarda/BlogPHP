<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function creating(Post $post)  //setting the user ID when a post is created
    {
        if(! \App::runningInConsole()){
        $post->user_id = auth()->user()->id;
        }
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleting(Post $post)  //when a post is deleted, the image is also deleted from the storage folder
    {
        if($post->image){
            Storage::delete($post->image->url);
        }        
    }
    
}
