<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home');
})->name('home');

//Post Routes //CRUD 
Route::get('/posts',[PostController::class,'index'])->name('ListPosts');
Route::get('post/create',[PostController::class,'create'])->name('PostGetCreate');
Route::post('post/create', [PostController::class,'store'])->name('PostStore'); 

//get Edit
Route::get('/post/{postid}/edit',[PostController::class,'edit'])->name('PostGetUpdate');  

//Edit Modal
Route::post('/post/{postid}/update',[PostController::class,'update'])->name('PostUpdate');

Route::delete('/posts/{postid}',[PostController::class,'destroy'])->name('PostDelete');
Route::get('/posts/private',[PostController::class,'showPrivatePosts'])->name('UserPrivatePosts');


//List Post
Route::get('/post/{postid}/show',[PostController::class,'show'])->name('ShowPostDetails');

//Comment
Route::post('/post/AddComment',[CommentController::class,'store'])->name('StoreComment');

//Like
Route::post('/post/Addlike',[PostController::class,'likePost'])->name('LikePost');

