<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Book App')</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('books.index') }}">
            Book App
        </a>

        <div class="navbar-nav">

            <a
                class="nav-link {{ request()->is('books') ? 'active' : '' }}"
                href="{{ route('books.index') }}"
            >
                Books
            </a>

            <a
                class="nav-link {{ request()->is('books/featured') ? 'active' : '' }}"
                href="{{ route('books.featured') }}"
            >
                Featured
            </a>

        </div>

    </div>
</nav>

<div class="container mt-4">

    @yield('content')

</div>

<footer class="text-center mt-5 mb-3">
    Created by: Amor Tonio
    
</footer>

</body>
</html>