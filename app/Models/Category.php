<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName() //para que se coloque el slug en la url
    {
        return 'slug';
    }

    //Relación de uno a muchos

    public function posts(){
        return $this->hasMany(Post::class);
    }
    
}
