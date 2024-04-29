<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create','store');
        $this->middleware('can:admin.tags.edit')->only('edit','update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }
  
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index', compact ('tags'));
    }

    
    public function create()
    {
        $colors=[
            'red' => 'Red',
            'green' => 'Green',
            'blue' =>'Blue',
            'indigo'  =>'Indigo',
            'pink' => 'Pink',
            'yellow'  =>'Yellow',
            'purple' => 'Purple'
        ];

        return view('admin.tags.create', compact('colors'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);

      

        $tag = Tag::create($request->all());
 
        return redirect()->route('admin.tags.edit', $tag)->with('info', 'The tag was created ok');
    
    }

   
    public function edit(Tag $tag)
    {
        $colors=[
            'red' => 'Red',
            'green' => 'Green',
            'blue' =>'Blue',
            'indigo'  =>'Indigo',
            'pink' => 'Pink',
            'yellow'  =>'Yellow',
            'purple' => 'Purple'
        ];

        return view('admin.tags.edit', compact('tag','colors')); //el metódo compact permite trabajar con más de una variable
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required'
        ]);

         $tag->update($request->all());

         return redirect()->route('admin.tags.edit', $tag)->with('info', 'The tag was updated ok');
    }

 
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('info', 'The tag was deleted ok');
    }
}
