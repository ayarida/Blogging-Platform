<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $request->validate([
            'text'=>'required',
            'public'=>'required'
        ]); 
        $post=new Post([
            'text'=>$request->get('post-text'), 
            'public'=>$request->get('public')
        ]); 
        $post->save(); 
        return redirect('/post/create')->with('success','Post Created Successfully!');
    }
}
