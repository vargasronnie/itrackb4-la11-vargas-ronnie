<!DOCTYPE html>
<html>
<head>
    <title>{{ $recipe['name'] }} - Details</title>
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
        .detail-card { max-width: 620px; border: 1px solid #eee; border-radius: 4px; overflow: hidden; margin-top: 20px; }
        .detail-header { background: #1a1a1a; color: #fff; padding: 14px 18px; font-weight: bold; font-size: 1.1rem; }
        .detail-row { padding: 14px 18px; border-bottom: 1px solid #eee; }
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

    <h2>Recipe Details</h2>

    <div class="detail-card">
        <div class="detail-header">Name: {{ $recipe['name'] }}</div>
        <div class="detail-row">Category: {{ $recipe['category'] }}</div>
        <div class="detail-row">Cook Time: {{ $recipe['cook_time'] }}</div>
    </div>
</body>
</html>