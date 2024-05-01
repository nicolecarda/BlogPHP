<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
  use HandlesAuthorization;

        public function author(User $user, Post $post) //to prevent users from modifying posts from other users
        {
            if($user->id == $post->user_id){
                return true;
            }else{
                return false;
            }
        }

        public function published(? User $user, Post $post) //to prevent users from modifying draft posts
        {                                                   //question tag makes the user parameter optional; this lets one user that is not logged to see the posts
            if($post->status == 2){
                return true;
            }else{
                return false;
            }
        }

}
