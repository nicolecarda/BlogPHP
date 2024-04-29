<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['name', 'slug', 'color'];
/* 
    public function getRouteKeyName()
    {
        return 'tag';
    }
 */
public function getRouteKeyName() //para que se coloque el slug en la url
{
    return 'slug';
}

    use HasFactory;

    //Relación de muchos a muchos

    public function posts(){
        return $this->belongsToMany(Post::class);
     }
}
