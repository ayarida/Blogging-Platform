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

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        //dd($request);
        $request->validate([
            'text'=>'required',
            'public'=>'required'

        ]); 
        
        Post::create([
            'text'=>$request->input('text'), 
            'public'=>$request->input('public'),
            'user_id'=>Auth::id()
        ]);

        return redirect('/post/create')->with('success','Post Created Successfully!');
        
        /*$post=$request->get('text');
        $public=$request->get('public');

        return view('posts.index',[
            'post'=>$post,
            'public'=>$public
        ]);*/
    }




}
