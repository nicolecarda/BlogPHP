<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;


    protected $fillable = ['url']; //allows mass assignment for url

    //polymorphic relationship betwwen images and tags

    public function imageable(){
        return $this->morphTo(Tag::class);
     }

    
}
