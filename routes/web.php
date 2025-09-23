<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieNewsController;
use App\Http\Controllers\AuthController;

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');

// Debug route
Route::get('/debug', function () {
    return view('debug');
})->name('debug');

// Test route
Route::get('/test', function () {
    return view('test');
})->name('test');

// Test news create route (without middleware)
Route::get('/test-news-create', [MovieNewsController::class, 'create'])->name('test.news.create');

// Movie News routes (protected)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/news/create', [MovieNewsController::class, 'create'])->name('news.create');
    Route::post('/news', [MovieNewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [MovieNewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}', [MovieNewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [MovieNewsController::class, 'destroy'])->name('news.destroy');
});

// Movie News routes (public)
Route::get('/news', [MovieNewsController::class, 'index'])->name('news.index');
Route::get('/news/search', [MovieNewsController::class, 'search'])->name('news.search');
Route::get('/news/{id}', [MovieNewsController::class, 'show'])->name('news.show');




// Legacy route for backward compatibility
Route::get('/news-old', function () {
    return redirect()->route('news.index');
})->name('news');
