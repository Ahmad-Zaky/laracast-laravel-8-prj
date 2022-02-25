<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\SessionController;

// Posts
Route::get('/', [PostController::class, 'index'])->name("posts.index");
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name("posts.show");

// Guest
Route::middleware('guest')->group( function () {
    
    // Register
    Route::get('register', [SessionController::class, 'register'])->name("auth.register");
    Route::post('register', [SessionController::class, 'register'])->name("auth.register");

    // Login
    Route::get('login', [SessionController::class, 'login'])->name("auth.login");
    Route::post('login', [SessionController::class, 'login'])->name("auth.login");
});

// Auth
Route::middleware('auth')->group( function () {
    // Log Out
    Route::post('logout', [SessionController::class, 'logout'])->name("auth.logout");
});
