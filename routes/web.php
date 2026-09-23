<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return redirect()->route('movies.index');
});

Route::get('/movies', [MovieController::class, 'index'])
    ->name('movies.index');

Route::get('/movies/featured', [MovieController::class, 'featured'])
    ->name('movies.featured');

Route::get('/movies/{id}', [MovieController::class, 'show'])
    ->name('movies.show');

// Old filter URL
Route::get('/movies/filter/{genre?}', function ($genre = null) {

    return redirect()->route('movies.index', [
        'genre' => $genre
    ]);

})->name('movies.filter');