<?php

use App\Http\Controllers\AdminPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsletterController;




// Newsletter
Route::post('newsletter', NewsletterController::class)->name('newsletter');

// Guest
Route::middleware('guest')->group( function () {
    
    // Register
    Route::get('register', [SessionController::class, 'register'])->name("register");
    Route::post('register', [SessionController::class, 'register'])->name("register");

    // Login
    Route::get('login', [SessionController::class, 'login'])->name("login");
    Route::post('login', [SessionController::class, 'login'])->name("login");
});

// Auth
Route::middleware('auth')->group( function () {
    // Log Out
    Route::post('logout', [SessionController::class, 'logout'])->name("logout");

    Route::prefix('admin')->name('admin.')->middleware('can:admin')->group( function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');

        // Posts
        Route::resource('posts', AdminPostController::class)->except('show');
    });

    // Post Comments
    Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->name("posts.comments.store");
});

// Posts
Route::get('/', [PostController::class, 'index'])->name("posts.index");
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name("posts.show");