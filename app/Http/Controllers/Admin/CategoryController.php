<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.categories.index')->only('index');     //Middleware can establishes which user con access to the view
        $this->middleware('can:admin.categories.create')->only('create','store');
        $this->middleware('can:admin.categories.edit')->only('edit','update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
    }

    
    public function index()  //Index recovers all the information of the categories and show it in the view
    {
        $categories = Category::all();

        return view('admin.categories.index', compact ('categories'));
    }

    public function create()  //Create returns the create view
    {
        return view('admin.categories.create');
    }

  
    public function store(Request $request)  //store validates the name and slug fields; recovers all the info from categories; and redirects th euser to edit view
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
    ]);

       $category = Category::create($request->all());

       return redirect()->route('admin.categories.edit', $category->id)->with('info', 'The category was created ok');  //if the category ws created ok, a message is showed
    }


    public function edit(Category $category)   //edit returns the edit view
    {
        return view('admin.categories.edit', compact('category'));
    }

   
    public function update(Request $request, Category $category)  //update validates name and slug fields; then recovers all the information from categories, and redirects the user to the edit view; if the category is updated ok a message is shown
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:categories,slug,$category->id"
         ]);

         $category->update($request->all());

         return redirect()->route('admin.categories.edit', $category)->with('info', 'The category was updated ok');
    }

    
    public function destroy(Category $category) //destroy calls the delete method and redirects the user to the indx view; if the category is deleted ok a message is shown
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('info', 'The category was deleted ok');
    }
}
