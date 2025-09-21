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

// Movie News routes (public)
Route::get('/news', [MovieNewsController::class, 'index'])->name('news.index');
Route::get('/news/search', [MovieNewsController::class, 'search'])->name('news.search');
Route::get('/news/{id}', [MovieNewsController::class, 'show'])->name('news.show');

// Movie News routes (protected - require admin authentication)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/news/create', [MovieNewsController::class, 'create'])->name('news.create');
    Route::post('/news', [MovieNewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}/edit', [MovieNewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}', [MovieNewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [MovieNewsController::class, 'destroy'])->name('news.destroy');
});



// Legacy route for backward compatibility
Route::get('/news-old', function () {
    return redirect()->route('news.index');
})->name('news');
