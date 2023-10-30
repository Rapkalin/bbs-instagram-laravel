<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
// Home route
Route::get('/', [HomeController::class, 'landing'])->name('home.landing');

// Login
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'dologin'])->name('auth.dologin');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// User routes
Route::resource('users', UserController::class)->parameters(['user' => 'id']);

// Instagram routes
Route::get('instagram-auth-success', [InstagramAuthController::class, 'show'])->middleware('auth');

