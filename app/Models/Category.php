<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug']; //allows mass assignment for name and slug fields

    public function getRouteKeyName() //showing the slug in the url
    {
        return 'slug';
    }

    //one to many relationship with posts

    public function posts(){
        return $this->hasMany(Post::class);
    }
    
}
