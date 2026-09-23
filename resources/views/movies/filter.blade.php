<!DOCTYPE html>
<html>
<head>
    <title>Movie Filter</title>
</head>
<body>

    h1>Movie Filter</h1>

    <p><strong>Full Name:</strong> Aira Basco</p>

    <p>{{ $message }}</p>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Director</th>
            <th>Genre</th>
            <th>Year</th>
        </tr>

        @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie['id'] }}</td>
                <td>{{ $movie['title'] }}</td>
                <td>{{ $movie['director'] }}</td>
                <td>{{ $movie['genre'] }}</td>
                <td>{{ $movie['year'] }}</td>
            </tr>
        @endforeach
    </table>

    <br>

    <a href="{{ route('movies.index') }}">
        ← Back to Movies
    </a>

</body>
</html>