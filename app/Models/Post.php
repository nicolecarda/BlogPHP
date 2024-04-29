<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];//guarded permite definir aquellos campos que no queremos que se llenen por asignación masiva al contrario de fillable

    //Relación de uno a muchos inversa

    public function getRouteKeyName() //para que se coloque el slug en la url
    {
        return 'slug';
    }
    
    public function user(){
       return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
     }


     //Relación de muchos a muchos

     public function tags(){
        return $this->belongsToMany(Tag::class);
     }

     //relación de uno a uno polimorfica
     public function image(){
      return $this->morphOne(Image::class, 'imageable');
   }

}
