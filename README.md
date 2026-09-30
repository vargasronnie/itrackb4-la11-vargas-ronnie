# LA7 - Recipe Flex

## Q1. Why POST and not GET?

If my form used GET, the recipe details would be sent in the URL, and the browser would treat the request like any other page visit. When a page is refreshed, the browser simply repeats its last request, so pressing refresh (or the back button, or opening a bookmarked link) would send the same data to `store()` again and save a duplicate recipe each time. GET is meant for reading data, not changing it, so it should never be used to save a record. POST keeps the data out of the URL and is the correct method for actions that create something.

## Q2. What stops the save when validation fails?

When a rule in `$request->validate()` fails, Laravel does not return normally from that line. It throws a validation exception, so the rest of `store()`, including the lines that add the recipe and call `saveRecipes()`, never runs. Laravel catches that exception automatically and redirects the visitor back to the form at `/recipes/create`. The error messages and the values they typed are flashed to the session, which is why the messages appear beside each field and the inputs keep their values.

## Q3. Why doesn't the success message appear on every page?

My layout checks `session('success')` on every page, so the check does run everywhere, but the message only exists at one moment. `redirect()->route('recipes.index')->with('success', ...)` stores the message as flash data, which Laravel keeps in the session for the next request only. The recipe list page reads it and shows it, and then Laravel removes it. On every later page load, including a refresh, `session('success')` is empty, so the `@if` is false and nothing is displayed.
