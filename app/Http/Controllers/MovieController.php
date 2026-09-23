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
                'author' => 'Christopher Nolan',
                'year' => 2010,
                'genre' => 'Sci-Fi'
            ],

            2 => [
                'id' => 2,
                'title' => 'The Dark Knight',
                'author' => 'Christopher Nolan',
                'year' => 2008,
                'genre' => 'Action'
            ],

            3 => [
                'id' => 3,
                'title' => 'Interstellar',
                'author' => 'Christopher Nolan',
                'year' => 2014,
                'genre' => 'Sci-Fi'
            ],

            4 => [
                'id' => 4,
                'title' => 'The Matrix',
                'author' => 'The Wachowskis',
                'year' => 1999,
                'genre' => 'Sci-Fi'
            ],

            5 => [
                'id' => 5,
                'title' => 'The Godfather',
                'author' => 'Francis Ford Coppola',
                'year' => 1972,
                'genre' => 'Crime'
            ],

            6 => [
                'id' => 6,
                'title' => 'Avengers: Endgame',
                'author' => 'Anthony Russo and Joe Russo',
                'year' => 2019,
                'genre' => 'Action'
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
                    $movie['author'],
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
}