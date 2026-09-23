@extends('layouts.app')

@section('title', 'All Books')

@section('content')

<h2>Book List</h2>

<p>
    @if($category !== '' && $author !== '')

        Showing books with
        Category: <strong>{{ $category }}</strong>
        and Author: <strong>{{ $author }}</strong>

    @elseif($category !== '')

        Showing books with
        Category: <strong>{{ $category }}</strong>

    @elseif($author !== '')

        Showing books with
        Author: <strong>{{ $author }}</strong>

    @else

        Showing all books

    @endif
</p>

<h5>Filter by Category</h5>

<a href="{{ route('books.index', ['category' => 'Fantasy', 'author' => $author]) }}">
    Fantasy
</a>
|
<a href="{{ route('books.index', ['category' => 'Classic', 'author' => $author]) }}">
    Classic
</a>
|
<a href="{{ route('books.index', ['category' => 'Romance', 'author' => $author]) }}">
    Romance
</a>

<h5 class="mt-3">Filter by Author</h5>

<a href="{{ route('books.index', ['author' => 'J.K. Rowling', 'category' => $category]) }}">
    J.K. Rowling
</a>
|
<a href="{{ route('books.index', ['author' => 'J.R.R. Tolkien', 'category' => $category]) }}">
    J.R.R. Tolkien
</a>
|
<a href="{{ route('books.index', ['author' => 'Antoine de Saint-Exupery', 'category' => $category]) }}">
    Antoine de Saint-Exupery
</a>
|
<a href="{{ route('books.index', ['author' => 'Lewis Carroll', 'category' => $category]) }}">
    Lewis Carroll
</a>

<div class="mt-3">

    <a
        href="{{ route('books.index') }}"
        class="btn btn-secondary"
    >
        Clear All Filters
    </a>

</div>

<table class="table table-bordered table-striped mt-3">

    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

        @foreach($books as $book)

        <tr>

            <td>{{ $book['id'] }}</td>

            <td>
                {{ $book['title'] }}
            </td>

            <td>
                {{ $book['author'] }}
            </td>

            <td>
                {{ $book['year'] }}
            </td>

            <td>
                {{ $book['category'] }}
            </td>

            <td>
                <a href="{{ route('books.show', ['id' => $book['id']]) }}">
                    View
                </a>
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection