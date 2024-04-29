<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
  use HandlesAuthorization;

        public function author(User $user, Post $post) //para evitar que el usuario pueda modificar cualquier post de cualquier usuario
        {
            if($user->id == $post->user_id){
                return true;
            }else{
                return false;
            }
        }

        public function published(? User $user, Post $post) //para evitar que el usuario pueda modificar un post draft
        {                                                   //al hacer opcional el parametro user con el signo de pregunta, un usuario no loggueado puede ver los posts
            if($post->status == 2){
                return true;
            }else{
                return false;
            }
        }

}
