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

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware(['auth']);
//to allow only the logged in users to see all the posts 
//middleware->gate which requests passes on it

//last part im making shortcut for this route
//posts-> will execute to me index fn


Route::group(['middleware' => ['auth']],function(){

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/edit', [PostController::class, 'edit'])->name('posts.edit');
});


//as it will save data
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
//put as i update in the data itself
Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();//takes me to the github pg to login there
});

Route::get('/auth/callback', function () {

    $githubUser = Socialite::driver('github')->user();//info github of the user
    dd($githubUser);

    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);

    Auth::login($githubUser);//as a user ur logged in nw in the system

    dd($user);
    // $user->token
});