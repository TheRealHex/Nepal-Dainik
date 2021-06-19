<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class websiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $techPost = Post::where('cat_id','=',3)->limit(4)->get();
            $natPost = Post::where('cat_id','=',1)->limit(4)->get();
            $category=Category::get();
            $post = Post::latest()->limit(3)->get();
            return view('newshome.index',compact('post','category','techPost','natPost'));
    }
    public function showPost($title)
    {
            $post = Post::where('title','=',$title)->first();
            $allPost = Post::where('title','!=',$title)->limit(6)->get();
            $randomPost = Post::find(5);
            $category=Category::get();
            return view('newshome.singlepage',compact('post','category','allPost','randomPost'));
    }

}
