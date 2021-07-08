<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role_id == 3)
        {
            $editor = User::where('role_id','=','2')->count();
            $writer = User::where('role_id','=','1')->count();
            return view('admin.dashboard',compact('writer','editor'));
        }
        elseif(Auth::user()->role_id == 2)
        {
            return view('editor.dashboard');
        }
        elseif(Auth::user()->role_id == 1)
        {
            return view('writer.dashboard');
        }
        else
        {
            return view('home');
        }
    }
}
