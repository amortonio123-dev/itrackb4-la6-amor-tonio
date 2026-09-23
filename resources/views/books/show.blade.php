@extends('layouts.app')

@section('title', $movie['title'])

@section('content')

<h2>Movie App</h2>

<div class="card mt-3" style="max-width: 500px;">

    <div class="card-body">

        <h3 class="mb-4">{{ $movie['title'] }}</h3>

        <p>
            <strong>Author:</strong>
            {{ $movie['author'] }}
        </p>

        <p>
            <strong>Year Published:</strong>
            {{ $movie['year'] }}
        </p>

        <p>
            <strong>Category:</strong>
            {{ $movie['genre'] }}
        </p>

        <a href="{{ route('movies.index') }}" class="btn btn-secondary">
            Back to Movies
        </a>

    </div>

</div>

@endsection