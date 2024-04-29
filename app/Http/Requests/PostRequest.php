<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class PostRequest extends FormRequest
{
   
    public function authorize()
    {
       
            return true;
     
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {      
        
        $post = $this->route()->parameter('post');

        $rules = [ 
            'name'=> 'required',
            'slug'=> 'required|unique:posts', 
            'status'=> 'required|in:1,2',
            'file'=> 'image'
        ];

        if($post){
            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        };

        if ($this->status == 2) {                 //campos requeridos para los post published
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
