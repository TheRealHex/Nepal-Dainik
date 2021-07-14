<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{


  // Admin
  public function approved()
  {
    $posts=Post::with('category')->where('status', '=', 'approve')->get();
    return view('admin.post-mgmt',compact('posts'));
  }

  public function pending()
  {
    $posts=Post::with('category')->where('status', '=', 'pending')->get();
    return view('admin.post-mgmt',compact('posts'));
  }

  public function declined()
  {
    $posts=Post::with('category')->where('status', '=', 'decline')->get();
    return view('admin.post-mgmt',compact('posts'));
  }


  // Editor
  public function editorIndex()
  {
    $posts=Post::with('category')->where('user_id','=',Auth()->id())->get();
    return view('editor.post-mgmt',compact('posts'));
  }


  // Writer
  public function writerIndex()
  {
    $posts=Post::with('category')->where('user_id','=',Auth()->id())->get();
    return view('writer.post-mgmt',compact('posts'));
  }

  public function create()
  {
    $category=Category::get();
    return view('post.create',compact('category'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
      'tags' => 'required',
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
          $post->tag = $request->input('tags');
          $post->breaking = $request->input('breaking');
          $post->save();
          return redirect()->route('post.index')->with('status','Post added on pending.');
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
        public function status(Request $request, $id)
        {
          $post = Post::find($id);
          $post->status = $request->input('status');
          $post->update();
          return redirect()->route('pendingPosts')->with('status','Task completed successfully.');
        }
      }
