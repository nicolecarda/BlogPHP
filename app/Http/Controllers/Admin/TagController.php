<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TagController extends Controller
{

    public function __construct() //Middleware can establishes which user con access to the view
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create','store');
        $this->middleware('can:admin.tags.edit')->only('edit','update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }
  
    public function index()  //Index recovers all the information of the tags and show it in the view
    {
        $tags = Tag::all();

        return view('admin.tags.index', compact ('tags'));
    }

    
    public function create() //Create adds a color field to the tag and returns the create view 
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


    public function store(Request $request)  //store validates the name, slug and color fields; recovers all the info from tags; and redirects the user to the edit view; if the tag is created ok a message is shown
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);

      

        $tag = Tag::create($request->all());
 
        return redirect()->route('admin.tags.edit', $tag)->with('info', 'The tag was created ok');
    
    }

   
    public function edit(Tag $tag)  //edit returns the edit view
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

        return view('admin.tags.edit', compact('tag','colors')); //the compact method allows working with more than one variable
    }

    public function update(Request $request, Tag $tag) //update validates name, slug and color fields; then recovers all the information from tags, and redirects the user to the edit view; if the tag is updated ok a message is shown
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required'
        ]);

         $tag->update($request->all());

         return redirect()->route('admin.tags.edit', $tag)->with('info', 'The tag was updated ok');
    }

 
    public function destroy(Tag $tag) //destroy calls the delete method and redirects the user to the indx view; if the tag is deleted ok a message is shown
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('info', 'The tag was deleted ok');
    }
}
