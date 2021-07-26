<?php 

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
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

    public function profile()
    {
        $users= auth()->id();
        $users = User::find($users);
        $roles = Role::all();
        return view('admin.user-preference',compact('users','roles'));
    }

    public function profileUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required', 'string', 'max:255',
            'address' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255',
            'phone' => 'nullable',
        ]);
        $user = User::find($id);
        if ($files = $request->file('image')) {
       // Define upload path
           $destinationPath = public_path('/userImage/'); // upload path
      // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
           if(File::exists($destinationPath)) {
            File::delete($destinationPath);
        }
        $fileNameToStore = $profileImage;
    }else{
        $fileNameToStore=$user->image;
    }
    $user->update([
        'image' => $fileNameToStore,
        'name'  => $request->get('name'),
        'address'=> $request->get('address'),
        'email'=> $request->get('email'),
        'phone'=> $request->get('phone'),
    ]);
    return redirect()->route('user.profile')->with('status', 'Profile Updated Successfully');
}
public function passwordForm()
{
    return view('admin.user-password');
}

public function password(Request $request)
{
    $validatedData = $request->validate([
        'password' => 'required', 'string', 'min:8','confirmed',
    ]);

    $user = User::find($request->user);
    $user->password = Hash::make($request->get('password'));
    $user->save();
    return redirect()->back()->with('status', 'Password Change Successfully');
}
}
