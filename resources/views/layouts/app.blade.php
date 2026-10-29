<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Recipe App')
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">

            <a class="navbar-brand"
               href="{{ route('recipes.index') }}">
                Recipe App
            </a>

            <div class="navbar-nav">

                <a class="nav-link"
                   href="{{ route('recipes.index') }}">
                    All Recipes
                </a>

                <a class="nav-link"
                   href="{{ route('recipes.featured') }}">
                    Featured
                </a>

                <a class="nav-link"
                   href="{{ route('recipes.index', ['cuisine_id' => 1]) }}">
                    Filipino
                </a>

                <a class="nav-link"
                   href="{{ route('recipes.index', ['cuisine_id' => 2]) }}">
                    Italian
                </a>

                <a class="nav-link"
                   href="{{ route('recipes.create') }}">
                    + Add Recipe
                </a>

            </div>

        </div>

    </nav>


    @if (session('success'))

        <div class="container mt-3">

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        </div>

    @endif


    @yield('content')

</body>

</html>