<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\PostController;
use App\Models\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search =  $request->input('search');
        if($search!=""){
            $post = Post::where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%')->orwhere('tag', 'like', '%'.$search.'%');
            })->get();
        }
        else{$post = Post::limit(10)->get();}
        return View('newshome.search')->with('data',$post);
    }
}
