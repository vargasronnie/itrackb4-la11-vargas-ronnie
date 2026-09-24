```blade
<nav style="
    background: #1a1a1a;
    padding: 15px 40px;
">

    <a href="{{ route('recipes.index') }}"
       style="
           color: white;
           text-decoration: none;
           margin-right: 20px;
           font-weight: bold;
       ">
        Recipe Flex
    </a>

    <a href="{{ route('recipes.index') }}"
       style="
           color: white;
           text-decoration: none;
           margin-right: 20px;
       ">
        Recipes
    </a>

    <a href="{{ route('recipes.featured') }}"
       style="
           color: white;
           text-decoration: none;
       ">
        Featured Recipe
    </a>

</nav>
```
