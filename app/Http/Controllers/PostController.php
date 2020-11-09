<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //For Listing the Posts 
    public function index(){
        $posts=Post::where('public',1)->paginate(5);
        return view('posts.index',[
            'posts'=>$posts, 
            'user'=>Auth::user(),
            'userId'=>Auth::id()
        ]);
    }

    //Create post-form
    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'text'=>'required',
            'public'=>'required',
            'image'=>'required|image:jpeg,png,jpg,gif,svg|max:2048',

        ]); 
        
        $imageName=Auth::id().$request->title.'.'.$request->image->extension();
        Post::create([
            'title'=>$request->input('title'),
            'text'=>$request->input('text'), 
            'public'=>$request->input('public'),
            'user_id'=>Auth::id(),
            'image'=> $imageName,
        ]);
    
        $request->image->move(public_path('images'),$imageName); 

        return redirect('/post/create')->with('success','Post Created Successfully!');
       
    }

    //Edit Post
    public function edit($PostId){
        $post=Post::find($PostId); 
        
        return response()->json([
            'data'=>$post
        ]);

    }

    //Delete Post
    public function destroy($PostId){
        $post=Post::find($PostId); 
        $post->delete();
        return redirect('/posts')->with('success', 'Customer deleted!');
    }

    //Show Post Details
    public function show($PostId){
        
        $post=Post::find($PostId); 
        return view('posts.show',[
            'post'=>$post
        ]);
    }

    //Function to lists all the public posts in main Page
    public function showPublicPosts(){
        $posts=Post::where('public',1)->paginate(5);
        return view('posts.guest',[
            'posts'=>$posts,
            'userId'=>Auth::id(),
            'user'=>Auth::user()
        ]);
    }

    public function showPrivatePosts(){
        $posts=Post::where('user_id',Auth::id())->where('public',0)->paginate(5);
        return view('posts.index',[
            'posts'=>$posts,
            'user'=>Auth::user(),
            'userId'=>Auth::id()
        ]);
    }

    //Handle user Like for the post 
   
   
    public function likePost(Request $request){
        $UserLike=Like::where('user_id',Auth::id())
        ->where('post_id',$request->post_id)->first();
        
        //if dislike then make it like
        if($UserLike===null){
            Like::create([
                'user_id'=>Auth::id(), 
                'post_id'=>$request->post_id
            ]);
            return response()->json(['success'=>'Like']); 
        }
        else{
            $UserLike->delete(); //soft delete it from database 
            return response()->json(['success'=>'Dislike']); 
        }

    }


}
