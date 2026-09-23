@extends('layouts.app')

@section('title', 'Book Details')

@section('content')

<div class="card shadow-sm">

    <div class="card-body">

        <h2>{{ $book['title'] }}</h2>

        <hr>

        <p>
            <strong>Author:</strong>
            {{ $book['author'] }}
        </p>

        <p>
            <strong>Year Published:</strong>
            {{ $book['year'] }}
        </p>

        <p>
            <strong>Category:</strong>
            {{ $book['category'] }}
        </p>

        @if ($book['category'] === 'Fantasy')
            <div class="alert alert-primary">
                This is one of our featured fantasy books.
            </div>
        @else
            <div class="alert alert-secondary">
                This book belongs to the {{ $book['category'] }} category.
            </div>
        @endif

        <a href="{{ route('books.index') }}"
           class="btn btn-primary">
            Back to Books
        </a>

    </div>

</div>

@endsection