<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['name', 'slug', 'color']; //allows mass assignment for name, slug and color fields

public function getRouteKeyName() //showing the slug in the url
{
    return 'slug';
}

    use HasFactory;

    //Many to many relationship with posts

    public function posts(){
        return $this->belongsToMany(Post::class);
     }
}
