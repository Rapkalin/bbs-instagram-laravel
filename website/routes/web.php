<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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


// User routes
Route::get('/{slug}', [UserController::class, 'show'])->name('user.show');
Route::get('/{id}', [UserController::class, 'edit'])->name('user.edit');

// Post route
Route::get('/{id}', [PostController::class, 'show'])->name('post.show');

