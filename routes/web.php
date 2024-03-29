<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    // return view('home');
    return view('no-auth-home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/greet', function () {
    $name = 'John';
    return view('greet', ['name'=> $name]);
});

Route::get('/users', [UserController::class, 'index']);

Route::resource('posts', PostController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
