# ITRACKB4 LA11: Finish Your Own CRUD

## G1: What two things must be true for route model binding, and what happens if only one is?

The method parameter must be type-hinted with the model class (`Recipe $recipe`), and its variable name must match the route segment (`{recipe}`). If the name is wrong, Laravel can't match it to the URL segment, so the record isn't loaded and the method gets an empty `Recipe` instead. If the type-hint is missing, the method receives only the raw id, so code that uses `$recipe->name` breaks.

## G2: Why did my Delete link not give a 404 even though the address was correct?

The Delete link sends a GET request to `/recipes/{id}`, and that address is already the `show` route, so Laravel loaded the detail page instead of returning a 404. The destroy route only answers DELETE, which a link can't send, so the delete has to be a form that sends a DELETE request through `@method('DELETE')`.

## G3: What would break if I left out the second argument of old() on the edit form, and what would break if I used only the second argument?

Without the second argument, the edit form opens with blank fields, because there's no recipe value to fall back on. If I used only the recipe value and left out the `old()` input, a failed validation would throw away my typed changes and show the original values again.