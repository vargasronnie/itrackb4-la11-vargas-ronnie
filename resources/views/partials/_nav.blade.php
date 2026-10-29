<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand"
           href="{{ route('movies.index') }}">
            Movie App
        </a>

        <div class="navbar-nav">

            <a class="nav-link"
               href="{{ route('movies.index') }}">
                All Movies
            </a>

            <a class="nav-link"
               href="{{ route('movies.featured') }}">
                Featured
            </a>

            <a class="nav-link"
               href="{{ route('movies.index', ['genre' => 'Sci-Fi']) }}">
                Sci-Fi
            </a>

            <a class="nav-link"
               href="{{ route('movies.index', ['genre' => 'Action']) }}">
                Action
            </a>

            <a class="nav-link"
               href="{{ route('movies.index', ['genre' => 'Crime']) }}">
                Crime
            </a>

            <a class="nav-link"
               href="{{ route('movies.create') }}">
                + Add Movie
            </a>

        </div>

    </div>

</nav>