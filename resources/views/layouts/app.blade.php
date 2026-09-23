<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Movie App')
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="{{ route('movies.index') }}">
            Movie App
        </a>

        <div class="navbar-nav">

            <a
                class="nav-link {{ (request()->is('movies') || request()->is('movies/*')) && !request()->is('movies/featured') ? 'active' : '' }}"
                href="{{ route('movies.index') }}"
            >
                Movies
            </a>

            <a
                class="nav-link {{ request()->is('movies/featured') ? 'active' : '' }}"
                href="{{ route('movies.featured') }}"
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

    <p>Created by: Aira Basco</p>

</footer>

</body>

</html>