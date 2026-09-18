<!DOCTYPE html>
<html>
<head>
    <title>Recipes List</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { font-size: 2.5rem; margin-bottom: 4px; }
        .prepared-by { color: #444; margin-bottom: 20px; }
        .nav-buttons a {
            display: inline-block;
            padding: 8px 16px;
            margin-right: 10px;
            border: 1px solid #3b82f6;
            border-radius: 4px;
            color: #3b82f6;
            text-decoration: none;
        }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background: #1a1a1a; color: #fff; text-align: left; padding: 12px; }
        td { padding: 12px; border-bottom: 1px solid #eee; }
        tr:nth-child(even) { background: #f5f5f5; }
        .recipe-link {
            display: inline-block;
            border: 1px solid #3b82f6;
            border-radius: 4px;
            padding: 4px 10px;
            color: #3b82f6;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Recipe Flex</h1>
    <p class="prepared-by">Prepared by: Your Name</p>

    <div class="nav-buttons">
        <a href="{{ route('recipes.index') }}">Recipe List</a>
        <a href="{{ route('recipes.featured') }}">Featured Recipe</a>
        <a href="{{ route('recipes.filter') }}">Filter List</a>
    </div>

    <h2>My Recipe List</h2>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Category</th>
                <th>Cook Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe['id'] }}</td>
                    <td>
                        <a class="recipe-link" href="{{ route('recipes.show', $recipe['id']) }}">
                            {{ $recipe['name'] }}
                        </a>
                    </td>
                    <td>{{ $recipe['category'] }}</td>
                    <td>{{ $recipe['cook_time'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>