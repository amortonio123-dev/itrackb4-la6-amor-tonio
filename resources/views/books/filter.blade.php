@extends('layouts.app')

@section('title', 'Book Filter')

@section('content')

<div class="card shadow-sm">

    <div class="card-body">

        <h2>Book Filter</h2>
        <p>Prepared by: Amor Tonio</p>

        @if ($category)
            <p>
                Showing books for:
                <strong>{{ $category }}</strong>
            </p>
        @else
            <p>Showing all books.</p>
        @endif

        <div class="table-responsive">

            <table class="table table-striped table-bordered">

                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year</th>
                        <th>Category</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($books as $book)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book['title'] }}</td>
                            <td>{{ $book['author'] }}</td>
                            <td>{{ $book['year'] }}</td>
                            <td>{{ $book['category'] }}</td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center">
                                No books found for this filter.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <a href="{{ route('books.index') }}"
           class="btn btn-primary">
            Back to All Books
        </a>

    </div>

</div>

@endsection