<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
      $posts=Post::with('category')->get();
      return view('admin.post-mgmt',compact('posts'));
    }
    public function writerIndex()
    {
      $posts=Post::with('category')->where('user_id','=',Auth()->id())->get();
      return view('writer.post-mgmt',compact('posts'));
    }
    public function editorIndex()
    {
      $posts=Post::with('category')->where('user_id','=',Auth()->id())->get();
      return view('editor.post-mgmt',compact('posts'));
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

    public function status(Request $request, $id)
    {
        // dd($request->all());
      $post = Post::find($id);
        // dd($post);
      $post->status = $request->input('status');
      $post->update();
      return redirect()->route('getPosts')->with('status','Status Updated.');
    }

    public function edit($id)
    {
      $post = Post::find($id);
      $category=Category::get();
      return view('post.edit',compact('post','category'));

    }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'title' => 'required',
        'image.*' => 'image mimes:jpeg, png, jpg,gif, svg|max:2048*',
        'content' => 'required'
      ]);
      $post = Post::find($id);
      if($request->hasfile('image'))
      {
        $image=$request->file('image');
        $name=$image->getClientOriginalName();
        $image->move(public_path().'/image/', $name);

        $image_path = public_path().'/image/'.$post->image;
        if(File::exists($image_path)) {
          File::delete($image_path);
        }

        $name;
      }
      $post->image = $name;
      $post->title = $request->input('title');
      $post->content = $request->input('content');
      $post->cat_id = $request->input('cat_id');
      $post->user_id = Auth()->id();
      $post->update();
      return redirect()->route('post.index')->with('status','Post Updated.');
    }

    public function destroy($id)
    {
      $post = Post::find($id);
      $image_path = public_path().'/image/'.$post->image;
      if(File::exists($image_path)) {
        File::delete($image_path);
      }
      $post->delete();
      return redirect()->route('post.index')->with('status','Post Deleted.');
    }
  }
