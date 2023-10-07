<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class Question implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // foreach ($rows as $index => $row) {
        //     if ($index === 0) {
        //         continue; // Skip the first row (index 0)
        //     }
        // }

    }
}
