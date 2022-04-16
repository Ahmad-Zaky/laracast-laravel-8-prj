<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\NewsletterController;


// Posts
Route::get('/', [PostController::class, 'index'])->name("posts.index");
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name("posts.show");

// Newsletter
Route::post('newsletter', NewsletterController::class)->name('newsletter');

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
    
    // Post Comments
    Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->name("posts.comments.store");
});
