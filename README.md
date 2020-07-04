## Laravel Bulk Package

#### A package for laravel that allows bulk data insertion

for example, when you have such data:

```
$categories = collect([
    ['name' => 'Category 1'],
    ['name' => 'Category 2'],
    ['name' => 'Category 3'],
]);
```

you just write:

```
Bulk::insert('categories', 'name', $categories);
```

and you will get:
- check data for existing records
- inserts data in one query
- returns the rows of created records
