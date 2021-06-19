<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::with('category')->where('user_id','=',Auth()->id())->get();
        return view('writer.post-mgmt',compact('posts'));
    }
    public function adminIndex()
    {
        $posts=Post::with('category')->get();
        return view('admin.post-mgmt',compact('posts'));
    }

    public function my_posts()
    {
        return view('writer.myposts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::get();
        return view('post.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
        'title' => 'required',
        'image.*' => 'image mimes:jpeg, png, jpg,gif, svg|max:2048*',
        'content' => 'required'
        ]);
        if($request->hasfile('image'))
        {
            $image=$request->file('image');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/image/', $name); // your folder path
            $name;
        }
        $post = new Post();
        $post->title = $request->input('title');
        $post->image = $name;
        $post->content = $request->input('content');
        $post->cat_id = $request->input('cat_id');
        $post->user_id = Auth()->id();
        $post->save();
        return redirect()->route('post.index')->with('status','Post added on pending.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $category=Category::get();
        return view('post.edit',compact('post','category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->cat_id = $request->input('cat_id');
        $post->user_id = Auth()->id();
        $post->update();
        return redirect()->route('post.index')->with('status','Post Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index')->with('status','Post Deleted.');
    }
}
