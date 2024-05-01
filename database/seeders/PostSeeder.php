<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::factory(300)->create(); //create 300 posts

        foreach($posts as $post) {
            
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class
             ]);
    
             $post-> tags()-> attach([ //relates one post with two random tags
                rand(1, 4), //choose a number between 1 and 4
                rand(5, 8), //choose a number between 5 and 8
             ]);
        }

    }
}
