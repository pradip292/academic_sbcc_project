<?php

namespace App\Imports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Students;

class StudentsImport implements ToCollection
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
            $existingstudents = DB::table('students')
            ->where('sprn', $row[1])
            ->where('type', 1)
            ->first();
        
            if (!is_null($existingstudents)) {
                continue; 
            }
            Students::create([

                'sname' => $row[0],
                'sprn'=> $row[1],
                'sdepart'=> $row[2],
                'sclass'=> $row[3],
                'sdiv'=> $row[4],
                'semail'=> $row[5],
                'sdob'=>$row[6],
                'type'    =>1,
            ]);
        }
       

    }
}
