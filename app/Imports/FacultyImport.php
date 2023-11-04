<?php

namespace App\Imports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Faculty;

class FacultyImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            if ($index === 0) {
                continue; 
            }
            $existingfaculty = DB::table('faculties')
            ->where('fname', $row[1])
            ->where('type', 1)
            ->first();
        
            if (!is_null($existingfaculty)) {
                continue; 
            }
            faculty::create([
                'fname' => $row[0],
                'fdepart'=> $row[1],
                'fmail'=> $row[2],
                'type'    =>1,
            ]);
        }
       

    }
}
