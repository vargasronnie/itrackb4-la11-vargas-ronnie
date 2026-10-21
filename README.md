Laboratory Activity 10:

G1: Which column did you turn into a table, and why that one and not another?
I turned the cuisine column into a cuisines table. Its values come from a fixed list (Filipino, Italian, and Thai), the same values repeat across many recipes, and a cuisine could later need details of its own, such as a region. Columns like time and servings are numbers that vary from recipe to recipe, so they don’t belong in a lookup table.

G2: What number did screenshot 6 show, and why exactly that number?
Screenshot 6 showed the Queries count with with() removed, which is the number of queries the page ran. One query loaded the five recipes, and then one more query ran for each recipe to get its cuisine, so the count is 6. Adding with('cuisine') reduces this to 2, one for the recipes and one for all the cuisines.

G3: Your belongsTo method is named in the singular. What would break if you made it plural?
Laravel takes the method name, adds _id, and looks for that column on the recipes table. If the method were called cuisines(), Laravel would look for cuisines_id, which doesn’t exist, so loading the relationship would fail with an error about a missing column.