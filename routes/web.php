<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CarousellController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('reviews', ReviewController::class);
    Route::put('/reviews/{review}', [ReviewController::class, 'liked'])->name('reviews.liked');

    Route::resource('books', BookController::class);

    Route::get('/carousel', [CarousellController::class, 'index'])->name('carousel.index');
});

require __DIR__.'/auth.php';
