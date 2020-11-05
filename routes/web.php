<?php

use App\Http\Controllers\PostController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/posts',[PostController::class,'index'])->name('ListPosts');
Route::get('post/create',[PostController::class,'create'])->name('PostGetCreate');
Route::post('post/create', [PostController::class,'store'])->name('PostStore'); 
Route::get('/posts/{postid}/edit',[PostController::class,'edit'])->name('PostGetUpdate'); //get the form to update the post 
Route::delete('/posts/{postid}',[PostController::class,'destroy'])->name('PostDelete');
//Route::patch('/posts/{postid}',[PostController::class,'update'])->name('postupdate');*/