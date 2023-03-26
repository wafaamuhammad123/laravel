<?php

//hit=> make request


use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts',[PostController::class, 'index'])->middleware('auth:sanctum');//:=> bb pass par
//sanctum=> pckg helps in implement the token(that is sent with eact req)
Route::get('/posts/{post}',[PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'store']);

// token=> str unique bet usres and sent by each req and by using it server check 
// on the val and see whether token valid or not ..u as a user authenticated or not

Route::post('/sanctum/token', function (Request $request) {//when posting a req here, I make validation on these data 
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {//if user's not exist or wrong pass
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;//return token
});