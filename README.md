Laboratory Activity 9: Your Own Table, Your Own Model

F1: Which column did you make nullable, and why that one and not another?
I made notes nullable because not every recipe needs extra cooking tips or comments, so the field can stay empty. The other columns, such as name, time, and difficulty, describe every recipe, so they must always have a value.

F2: Which step failed first for you, and what did the error say?
The first failure was in Tinker, when I ran App\Models\Recipe::create(['title' => 'test']) before adding $fillable. It threw MassAssignmentException: Add [title] to fillable property to allow mass assignment on [App\Models\Recipe], which showed that Laravel blocks mass assignment until the model lists its columns. I fixed it by adding $fillable to Recipe.php.

F3: You changed no Blade file in Part D, yet your pages still work. Why not?
The Blade files read keys such as $recipe['name'] and loop over $recipes, and my controller passes variables with the same names. Switching to Recipe::all() and findOrFail() only changed where the data comes from, and Eloquent models support array-style access, so the views displayed the same keys without any edits.