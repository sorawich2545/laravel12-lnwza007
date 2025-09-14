<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieNewsController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Movie News routes
Route::get('/news', [MovieNewsController::class, 'index'])->name('news.index');
Route::get('/news/search', [MovieNewsController::class, 'search'])->name('news.search');
Route::get('/news/{id}', [MovieNewsController::class, 'show'])->name('news.show');



// Legacy route for backward compatibility
Route::get('/news-old', function () {
    return redirect()->route('news.index');
})->name('news');
