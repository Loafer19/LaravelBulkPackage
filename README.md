## Laravel Bulk Package

##### A package for laravel that allows bulk data insertion

for example, when you have such data:

```
Illuminate\Support\Collection {#552 ▼
  #items: array:50 [▼
    0 => array:1 [▼
      "name" => "Перфораторы"
    ]
    1 => array:1 [▼
      "name" => "Дрели"
    ]
    ...
  ]
}
```

you just write:

```
Bulk::insert('categories', 'name', $categories);
```

and you will get:
- check data for existing records
- inserts data in one query
- returns the rows of created records
