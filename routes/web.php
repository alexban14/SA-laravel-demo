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

Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Route::resource('posts', PostController::class);
Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])
            ->name('index');
    Route::get('/{id}', [PostController::class, 'show'])
            ->name('show')
            ->where(['id' => '[0-9]+']);
    Route::get('/create', [PostController::class, 'create'])
            ->name('create');
    Route::post('/', [PostController::class, 'store'])
            ->name('store');
    Route::get('/{id}/edit', [PostController::class, 'edit'])
            ->name('edit')
            ->where(['id' => '[0-9]+']);
    Route::put('/{id}', [PostController::class, 'update'])
            ->name('update')
            ->where(['id' => '[0-9]+']);
    Route::delete('/{id}', [PostController::class, 'destroy'])
            ->name('destroy')
            ->where(['id' => '[0-9]+']);
})->name("posts");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
