<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    private function getMovies()
    {
        return [
            1 => [
                'id' => 1,
                'title' => 'Inception',
                'director' => 'Christopher Nolan',
                'genre' => 'Sci-Fi',
                'year' => 2010
            ],

            2 => [
                'id' => 2,
                'title' => 'The Dark Knight',
                'director' => 'Christopher Nolan',
                'genre' => 'Action',
                'year' => 2008
            ],

            3 => [
                'id' => 3,
                'title' => 'Interstellar',
                'director' => 'Christopher Nolan',
                'genre' => 'Sci-Fi',
                'year' => 2014
            ],

            4 => [
                'id' => 4,
                'title' => 'The Matrix',
                'director' => 'The Wachowskis',
                'genre' => 'Sci-Fi',
                'year' => 1999
            ],

            5 => [
                'id' => 5,
                'title' => 'The Godfather',
                'director' => 'Francis Ford Coppola',
                'genre' => 'Crime',
                'year' => 1972
            ],

            6 => [
                'id' => 6,
                'title' => 'Avengers: Endgame',
                'director' => 'Anthony Russo and Joe Russo',
                'genre' => 'Action',
                'year' => 2019
            ],
        ];
    }

    public function index(Request $request)
    {
        $genre = $request->query('genre', '');
        $author = $request->query('author', '');

        $movies = $this->getMovies();

        $filteredMovies = [];

        foreach ($movies as $movie) {

            $genreMatch = true;
            $authorMatch = true;

            if ($genre !== '') {
                $genreMatch = strcasecmp(
                    $movie['genre'],
                    $genre
                ) === 0;
            }

            if ($author !== '') {
                $authorMatch = strcasecmp(
                    $movie['director'],
                    $author
                ) === 0;
            }

            if ($genreMatch && $authorMatch) {
                $filteredMovies[] = $movie;
            }
        }

        return view('movies.index', [
            'movies' => $filteredMovies,
            'genre' => $genre,
            'author' => $author
        ]);
    }

    public function show($id)
    {
        $movies = $this->getMovies();

        if (!isset($movies[$id])) {
            abort(404);
        }

        return view('movies.show', [
            'movie' => $movies[$id]
        ]);
    }

    public function featured()
    {
        $movies = $this->getMovies();

        return view('movies.featured', [
            'movie' => $movies[3]
        ]);
    }
}