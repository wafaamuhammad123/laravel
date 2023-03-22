<?php

use App\Http\Controllers\PostController;
//use namspace of post controller
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [TestController::class, 'test']);
//when I go to the get req / go to testcontrol and execute test fn

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//last part im making shortcut for this route
//posts-> will execute to me index fn


Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

//as it will save data
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
//put as i update in the data itself
Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');