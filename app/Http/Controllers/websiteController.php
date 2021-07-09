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
        $category=Category::get();
        $hotPost = Post::where('status','=','approve')->get();
        $natPost = Post::where('status','=','approve')->where('cat_id','=',1)->limit(4)->get();
        $post = Post::where('status','=','approve')->latest()->limit(3)->get();
        return view('newshome.index',compact('post','category','hotPost','natPost'));
    }
    public function showPost($title)
    {
        // dd($title);
        $post = Post::where('title','=',$title)->first();
        $allPost = Post::where('title','!=',$title)->limit(6)->get();
        $category=Category::get();
        return view('newshome.singlepage',compact('post','allPost','category'));
    }

    public function contact()
    {
        $category=Category::get();
        return view('newshome.contact',compact('category'));
    }
    public function sponsor()
    {
        $category=Category::get();
        return view('newshome.sponsor',compact('category'));
    }
}
