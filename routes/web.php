<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews/create', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/edit/{review}', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::put('/reviews/update/{review}', [ReviewController::class, 'update'])->name('reviews.update');
Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
Route::put('/reviews/{review}', [ReviewController::class, 'liked'])->name('reviews.liked');
Route::delete('/reviews/{review}', [ReviewController::class, 'delete'])->name('reviews.delete');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/add', [BookController::class, 'add'])->name('books.add');
Route::post('/books/add', [BookController::class, 'store'])->name('books.store');
Route::get('/books/edit/{book}', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/update/{book}', [BookController::class, 'update'])->name('books.update');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::delete('/books/{book}', [BookController::class, 'delete'])->name('books.delete');
