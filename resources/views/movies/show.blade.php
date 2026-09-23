@extends('layouts.app')

@section('title', $movie['title'])

@section('content')

<h2>Movie Details</h2>

<div class="card mt-3" style="max-width: 500px;">

    <div class="card-body">

        <h4 class="card-title">
            {{ $movie['title'] }}
        </h4>

        <p>
            <strong>Full Name:</strong> Aira Basco
        </p>

        <p>
            <strong>ID:</strong> {{ $movie['id'] }}
        </p>

        <p>
            <strong>Title:</strong> {{ $movie['title'] }}
        </p>

        <p>
            <strong>Author:</strong> {{ $movie['author'] }}
        </p>

        <p>
            <strong>Genre:</strong> {{ $movie['genre'] }}
        </p>

        <p>
            <strong>Year:</strong> {{ $movie['year'] }}
        </p>

        <a href="{{ route('movies.index') }}" class="btn btn-secondary">
            Back to Movies
        </a>

    </div>

</div>

@endsection