<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function getUsers()
    {
        $users = User::where('role_id','!=','3')->get();
        return view('admin.users.index')->with('users',$users);
    }
    public function userEdit($id)
    {
        $users = User::find($id);
        return view('admin.users.edit')->with('users',$users);
    }
    public function roleupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('user-name');
        $users->usertype = $request->input('usertype');
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
