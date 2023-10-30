<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstagramAuthController;

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

// Login
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'dologin'])->name('auth.dologin');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Home route
Route::get('/', [HomeController::class, 'landing'])->name('home.landing');

// User routes
Route::resource('users', UserController::class)->parameters(['user' => 'id']);

// Post route
Route::get('/{id}', [PostController::class, 'show'])->name('post.show')->middleware('auth');
Route::get('instagram-get-auth', [InstagramAuthController::class, 'show'])->middleware('auth');

