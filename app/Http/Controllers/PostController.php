<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts=Post::paginate(5);
        return view('posts.index',[
            'posts'=>$posts, 
            'userId'=>Auth::id()
        ]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        //dd($request);
        $request->validate([
            'title'=>'required',
            'text'=>'required',
            'public'=>'required',
            // 'image'=>'required|image:jpeg,png,jpg,gif,svg|max:2048',

        ]); 
        
        // $imageName=Auth::id().'.'.$request->image->extension();
        Post::create([
            'title'=>$request->input('title'),
            'text'=>$request->input('text'), 
            'public'=>$request->input('public'),
            'user_id'=>Auth::id(),
            // 'image'=> $imageName,
        ]);
    
        // $request->image->move(public_path('images'),$imageName); 

        return redirect('/post/create')->with('success','Post Created Successfully!');
        //return redirect()->route('ListPosts');
    }

    public function edit($PostId){
        $post=Post::find($PostId); 
        return view('posts.edit',[
            'post'=>$post
        ]);
    }

    public function destroy($PostId){
        $post=Post::find($PostId); 
        $post->delete();
        return redirect('/posts')->with('success', 'Customer deleted!');
    }

    public function show($PostId){
        
        $post=Post::find($PostId); 
        return view('posts.show',[
            'post'=>$post
        ]);
    }

    //Function to lists all the public posts in main Page
    public function showPublicPosts(){
        $posts=Post::all()->where('public',1); //retrieve all the public posts 
        return view('posts.index',[
            'posts'=>$posts
        ]);
    }

}
