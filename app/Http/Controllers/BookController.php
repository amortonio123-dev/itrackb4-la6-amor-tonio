<?php

namespace App\Http\Controllers;

class BookController extends Controller
{
    private function getBooks()
    {
        return [
             1 =>[
                'id' => 1,
                'title' => 'Harry Potter and the Sorcerer\'s Stone',
                'author' => 'J.K. Rowling',
                'year' => 1997,
                'category' => 'Fantasy'
            ],
            2 =>[
                'id' => 2,
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'year' => 1937,
                'category' => 'Fantasy'
            ],
            3 => [
                'id' => 3,
                'title' => 'The Little Prince',
                'author' => 'Antoine de Saint-Exupery',
                'year' => 1943,
                'category' => 'Classic'
            ],
            4 =>[
                'id' => 4,
                'title' => 'Alice\'s Adventures in Wonderland',
                'author' => 'Lewis Carroll',
                'year' => 1865,
                'category' => 'Classic'
            ],
            5 => [
                'id' => 5,
                'title' => 'The Chronicles of Narnia',
                'author' => 'C.S. Lewis',
                'year' => 1950,
                'category' => 'Fantasy'
            ],
            6 => [
                 'id' => 6,
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'year' => 1813,
                'category' => 'Romance'
            ],
        ];
    }

    public function index()
    {
        $books = $this->getBooks();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function show($id)
    {
        $books = $this->getBooks();

        $book = collect($books)->firstWhere('id', $id);

        abort_if(!$book, 404);

        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function filter($category = null)
    {
        $books = $this->getBooks();

        if ($category) {
            $books = array_filter($books, function ($book) use ($category) {
                return strtolower($book['category']) === strtolower($category);
            });
        }

        return view('books.filter', [
            'books' => $books,
            'category' => $category
        ]);
    }

    public function featured()
    {
        $books = $this->getBooks();

        $featured = array_filter($books, function ($book) {
            return $book['category'] === 'Fantasy';
        });

        return view('books.filter', [
            'books' => $featured,
            'category' => 'Featured Fantasy Books'
        ]);
    }
}