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
        $posts=Post::all();
        return view('posts.index',[
            'posts'=>$posts
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
            'public'=>'required'

        ]); 
        
        Post::create([
            'title'=>$request->input('title'),
            'text'=>$request->input('text'), 
            'public'=>$request->input('public'),
            'user_id'=>Auth::id()
        ]);

        return redirect('/post/create')->with('success','Post Created Successfully!');
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

}
