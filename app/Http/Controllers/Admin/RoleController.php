<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
  
    public function index() //Index recovers all the information of the roles and show it in the view
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

  
    public function create() //Create recovers the permissions information, then returns it in the create view
    {
        $permissions = Permission::all();

        return view('admin.roles.create',compact('permissions'));
    }

    public function store(Request $request) //store recovers all the info from role; and redirects the user to edit view; if the role is created ok a message is shown
    {
        $request->validate([   //validates the name field
            'name'=>'required'
        ]);

        $role = Role::create($request->all());

        $role->permissions()->sync($request->permissions); 

        return redirect()->route('admin.roles.edit',$role)->with('info', 'The role was created ok');
        
    }

  
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

   
    public function edit(Role $role)  //edit recovers all the info from permissions and shows it in the edit view
    {
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    
    public function update(Request $request, Role $role) //update validates the name field, and redirects the user to the edit view; if the role is updated ok a message is shown
    {
        $request->validate([
            'name'=>'required'
        ]);

        $role->update($request->permissions);

        return redirect()->route('admin.roles.edit',$role)->with('info','The role was updated ok');
    }

    
    public function destroy(Role $role) //destroy calls the delete method and redirects the user to the indx view; if the category is deleted ok a message is shown
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('info','The role was deleted ok');
        
    }
}
