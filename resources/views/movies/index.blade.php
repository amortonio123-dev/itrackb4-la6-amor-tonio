@extends('layouts.app')

@section('title', 'Movie App')

@section('content')

<h2>Movie App</h2>

<div class="card mt-3">

    <div class="card-body">

        <h3>Movies</h3>

        <p>
            @if($genre !== '' && $author !== '')

                Genre: <strong>{{ $genre }}</strong>
                |
                Author: <strong>{{ $author }}</strong>

            @elseif($genre !== '')

                Genre: <strong>{{ $genre }}</strong>

            @elseif($author !== '')

                Author: <strong>{{ $author }}</strong>

            @else

                Showing all movies

            @endif
        </p>

        <h5>Filter by Genre</h5>

        <a href="{{ route('movies.index', ['genre' => 'Sci-Fi', 'author' => $author]) }}">
            Sci-Fi
        </a>

        |

        <a href="{{ route('movies.index', ['genre' => 'Action', 'author' => $author]) }}">
            Action
        </a>

        |

        <a href="{{ route('movies.index', ['genre' => 'Crime', 'author' => $author]) }}">
            Crime
        </a>

        <h5 class="mt-3">Filter by Author</h5>

        <a href="{{ route('movies.index', ['author' => 'Christopher Nolan', 'genre' => $genre]) }}">
            Christopher Nolan
        </a>

        |

        <a href="{{ route('movies.index', ['author' => 'The Wachowskis', 'genre' => $genre]) }}">
            The Wachowskis
        </a>

        |

        <a href="{{ route('movies.index', ['author' => 'Francis Ford Coppola', 'genre' => $genre]) }}">
            Francis Ford Coppola
        </a>

        |

        <a href="{{ route('movies.index', ['author' => 'Anthony Russo and Joe Russo', 'genre' => $genre]) }}">
            Anthony Russo and Joe Russo
        </a>

        <br><br>

        <a href="{{ route('movies.index') }}">
            Clear All Filters
        </a>

        <table class="table table-bordered mt-3">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Year Published</th>
                    <th>Category</th>
                </tr>
            </thead>

            <tbody>

                @foreach($movies as $movie)

                <tr>
                    <td>{{ $movie['id'] }}</td>
                    <td>{{ $movie['title'] }}</td>
                    <td>{{ $movie['author'] }}</td>
                    <td>{{ $movie['year'] }}</td>
                    <td>{{ $movie['genre'] }}</td>
                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection