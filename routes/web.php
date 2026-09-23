<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::get('/books', [BookController::class, 'index'])
    ->name('books.index');

Route::get('/books/featured', [BookController::class, 'featured'])
    ->name('books.featured');

Route::get('/books/{id}', [BookController::class, 'show'])
    ->name('books.show');