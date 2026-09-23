<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    private function getBooks()
    {
        return [
            1 => [
                'id' => 1,
                'title' => 'Harry Potter and the Sorcerer\'s Stone',
                'author' => 'J.K. Rowling',
                'year' => 1997,
                'category' => 'Fantasy'
            ],

            2 => [
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

            4 => [
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

    public function index(Request $request)
    {
        $category = $request->query('category', '');
        $author = $request->query('author', '');

        $books = $this->getBooks();

        $filteredBooks = [];

        foreach ($books as $book) {

            $categoryMatch = true;
            $authorMatch = true;

            if ($category !== '') {
                $categoryMatch = strcasecmp(
                    $book['category'],
                    $category
                ) === 0;
            }

            if ($author !== '') {
                $authorMatch = strcasecmp(
                    $book['author'],
                    $author
                ) === 0;
            }

            if ($categoryMatch && $authorMatch) {
                $filteredBooks[] = $book;
            }
        }

        return view('books.index', [
            'books' => $filteredBooks,
            'category' => $category,
            'author' => $author
        ]);
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

    public function featured()
    {
        $books = $this->getBooks();

        $featured = array_filter($books, function ($book) {
            return $book['category'] === 'Fantasy';
        });

        return view('books.featured', [
            'books' => $featured
        ]);
    }
}