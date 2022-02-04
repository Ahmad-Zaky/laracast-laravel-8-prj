<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;

// Auth
Route::middleware('guest')->group( function () {
    Route::get('register', [RegisterController::class, 'create'])->name("auth.register");
    Route::post('register', [RegisterController::class, 'store'])->name("auth.register");
});

// Posts
Route::get('/', [PostController::class, 'index'])->name("posts.index");
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name("posts.show");

