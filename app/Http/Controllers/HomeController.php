<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Carbon\Carbon;
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
            $todayPost = Post::whereDate('postdate', Carbon::today())->count();
            $editor = User::where('role_id','=','2')->count();
            $writer = User::where('role_id','=','1')->count();
            return view('admin.dashboard', compact('writer','editor','todayPost'));
    }
}
