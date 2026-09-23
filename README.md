Laboratory Activity 6

Q1 I did not need to add another route because the router matches the path of the request, not the query string values. The URLs `/movies`, `/movies?genre=Sci-Fi`, and `/movies?year=2014` all use the same `/movies` path. The query string only changes the data that the index method displays.

Q2 If both filters were route parameters, the values would become part of the route itself. For example, a URL for year 2014 without a genre would need a route structure that allows the genre parameter to be skipped while still providing the year parameter. This would make the URLs and routes more complicated compared with using query strings for filters.

 Q3 The pattern needed to change for the detail page because the detail URL is longer than the list URL, such as `/movies/3`. I used `movies*` so the navigation can match both the list and detail pages. The filter did not require another change because a query string does not change the path, so `/movies?genre=Sci-Fi` still has `/movies` as its path.

 Q4 I removed the old filter method because it was replaced by the new query-string filtering implementation. Keeping it would leave two different implementations for the same filtering task, with the old one no longer being used. I kept the empty store and update methods because those are unfinished controller methods for future activities, so they represent work that still needs to be implemented.
