<nav>
    <a
        href="{{ route('movies.index') }}"
        class="{{ request()->is('movies*') ? 'active' : '' }}"
    >
        Movies
    </a>
</nav>
