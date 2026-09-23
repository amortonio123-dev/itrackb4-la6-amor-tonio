@extends('layouts.app')

@section('title', 'All Movies')

@section('content')

<h2>Movie List</h2>

<p>
    @if($genre !== '' && $author !== '')
        Showing movies with
        Genre: <strong>{{ $genre }}</strong>
        and
        Author: <strong>{{ $author }}</strong>

    @elseif($genre !== '')
        Showing movies with
        Genre: <strong>{{ $genre }}</strong>

    @elseif($author !== '')
        Showing movies with
        Author: <strong>{{ $author }}</strong>

    @else
        Showing all movies
    @endif
</p>

{{-- Genre Filter --}}
<p>
    <strong>Genre:</strong>

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
</p>

{{-- Author Filter --}}
<p>
    <strong>Author:</strong>

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
</p>

{{-- Clear All --}}
<p>
    <a href="{{ route('movies.index') }}">
        Clear All Filters
    </a>
</p>

<table class="table table-bordered table-striped">

    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Author</th>
            <th>Year</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

        @foreach($movies as $movie)

        <tr>
            <td>{{ $movie['id'] }}</td>
            <td>{{ $movie['title'] }}</td>
            <td>{{ $movie['genre'] }}</td>
            <td>{{ $movie['author'] }}</td>
            <td>{{ $movie['year'] }}</td>

            <td>
                <a href="{{ route('movies.show', ['id' => $movie['id']]) }}">
                    View
                </a>
            </td>
        </tr>

        @endforeach

    </tbody>

</table>

@endsection