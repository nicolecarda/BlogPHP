<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controller;


class UserController extends Controller
{
   /*  public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit','update');
    }
    */
    
    public function index() //index returns the index view
    {
        return view('admin.users.index');
    }

    public function edit(User $user) //edit recovers all the info from roles and returns the edit view
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user) //update redirects the user to the edit view; if the role is updated ok, a message is shown
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.edit', $user)->with('info', 'The role was assigned successfully.');
    }
}
