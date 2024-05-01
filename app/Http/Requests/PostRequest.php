<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class PostRequest extends FormRequest
{
   
    public function authorize()  //users authorization is managed with spatie permissions
    {
       
            return true;
     
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()  //rules for validation of posts
    {      
        
        $post = $this->route()->parameter('post');

        $rules = [                                 //required fields for all posts (draft and published)
            'name'=> 'required',
            'slug'=> 'required|unique:posts', 
            'status'=> 'required|in:1,2',
            'file'=> 'image'
        ];

        if($post){
            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        };

        if ($this->status == 2) {                 //required fields only for published posts
            $rules = array_merge($rules, [ 
                'category_id'=> 'required',
                'tag_id'=> 'required',
                'extract'=> 'required',
                'body'=> 'required',
            ]);
        }

        return $rules;
    }
}
