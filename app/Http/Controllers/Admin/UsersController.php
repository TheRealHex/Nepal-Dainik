<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;

class UsersController extends Controller
{
    public function getUsers()
    {
        $users = User::get();
        return view('admin.users.index')->with('users',$users);
    }
    public function userEdit($id)
    {
        $roles=Role::where('type','!=','admin')->get();
        $users = User::find($id);
        return view('admin.users.edit',compact('roles'))->with('users',$users);
    }
    public function roleupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('user-name');
        $users->role_id = $request->input('usertype');
        $users->update();
        return redirect()->route('getUsers')->with('status','Role Updated.');
    }
    public function userdelete(Request $request ,$id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('getUsers')->with('status','User Account Deleted.');
    }

    public function postsStatus($id)
    {

    }
}
