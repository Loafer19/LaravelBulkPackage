<?php

namespace Loafer\LaravelBulkPackage;

use Illuminate\Support\Collection;

class Bulk
{
    public static function insert(string $table, string $column, Collection $data)
    {
        // get existing records from the database
        $models = \DB::table($table)->whereIn($column, $data->pluck($column))->get();

        // if the data to be written is the same as the existing data, return the existing data ... @TODO move to a better function
        if ($models->count() == $data->count())
            return $models;

        // creating a new collection to insert data
        $insertData = new Collection();

        // the loop is necessary so as not to insert duplicates
        foreach ($data as $item) {
            // checks for duplicates
            if (!$models->pluck($column)->contains($item[$column])) // if not a duplicate, add to insert data
                $insertData->add($item);
        }

        if ($insertData->isNotEmpty()) {
            $insertData = $insertData
                ->toArray();

            // inserts data
            \DB::table($table)->insert($insertData);
        }

        // gets records from the database, with new ones
        $models = \DB::table($table)->whereIn($column, $data->pluck($column))->get();

        return $models;
    }
}
