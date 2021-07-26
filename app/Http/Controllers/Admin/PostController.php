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
    $postcount=$posts->count();
    return view('writer.post-mgmt',compact('posts','postcount'));
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
    if ($files = $request->file('image')) {
       // Define upload path
           $destinationPath = public_path('/image/'); // upload path
 // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
           $fileNameToStore = $profileImage;
         }else{
          $fileNameToStore='';
        }
        $post = new Post();
        $post->title = $request->input('title');
        $post->image = $fileNameToStore;
        $post->content = $request->input('content');
        $post->cat_id = $request->input('cat_id');
        $post->user_id = Auth()->id();
        $post->tag = $request->input('tags');
        $post->breaking = $request->input('breaking');
        $post->postdate = $request->input('postDate');
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
        if ($files = $request->file('image')) {
       // Define upload path
           $destinationPath = public_path('/image/'); // upload path
      // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
           if(File::exists($destinationPath)) {
            File::delete($destinationPath);
          }
          $fileNameToStore = $profileImage;
        }else{
          $fileNameToStore=$post->image;
        }
        $post->image = $fileNameToStore;
        $post->title = $request->input('title');
        $post->user_id = Auth()->id();
        $post->status = 'pending';
        $post->content = $request->input('content');
        $post->cat_id = $request->input('cat_id');
        $post->breaking = $request->input('breaking');
        $post->tag = $request->input('tags');
        $post->postdate = $request->input('postDate');
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
        $post->remarks = $request->input('remarks');
        $post->update();
        return redirect()->back()->with('status','Task completed successfully.');
      }
    }
