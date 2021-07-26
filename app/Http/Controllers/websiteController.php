<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Sponsor;

class websiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    public function index()
    {
        $sponsorNormal=Sponsor::where('status','=','approved')->where('imageType','=','normal')->limit(3)->get();
        $sponsorBanner=Sponsor::where('status','=','approved')->where('imageType','=','banner')->get();
        $category=Category::get();
        $breakingNews = Post::where('status','=','approve')->where('breaking','=','on')->get();
        $natPost = Post::where('status','=','approve')->where('cat_id','=',1)->limit(4)->get();
        $post = Post::where('status','=','approve')->latest()->limit(5)->get();
        return view('newshome.index',compact('post','category','breakingNews','natPost','sponsorNormal','sponsorBanner'));
    }
    public function showPost($title)
    {
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

    public function catPost($name)
    {
        $title = $name;
        $id = Category::where('name','=',$name)->first();
        $cat = Post::where('cat_id','=',$id->id)->get();
        return view('newshome.category', compact('cat','title'));
    }
    public function sponsor()
    {
        return view('newshome.sponsor');
    }
    public function sponsorStore(Request $request)
    {

        $this->validate($request, [
            'company' => 'required|unique:sponsors',
            'website' => 'required|unique:sponsors',
            'phone' => 'required',
            'email' => 'required|string|email|max:255|unique:sponsors',
            'image'=> 'nullable|image|mimes:gif|max:2060'
        ]);
        if($request->hasfile('image'))
        {
            $image=$request->file('image');
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/ads/', $name);
            $name;
        }
        $sponsor = new Sponsor();
        $sponsor->company = $request->input('company');
        $sponsor->website = $request->input('website');
        $sponsor->email = $request->input('email');
        $sponsor->phone = $request->input('phone');
        $sponsor->image = $name;
        $sponsor->imageType = $request->input('imageType');
        $sponsor->message  = $request->input('message');
        $sponsor->save();
        return redirect()->route('sponsor')->with('status','Sponsor request added on pending.');   
    }

        public function destroy($id)
        {
          $sponsor = Post::find($id);
          $image_path = public_path().'/ads/'.$sponsor->image;
          if(File::exists($image_path)) {
            File::delete($image_path);
          }
          $sponsor->delete();
          return redirect()->route('sponsorMgmt')->with('status','Sponsor Deleted.');
        }
}
