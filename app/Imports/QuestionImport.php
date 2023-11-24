<?php

namespace App\Imports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Question;

class QuestionImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $type = 0;
        foreach ($rows as $index => $row) {
            if ($index === 0) {
                continue; 
            }
            $existingquestion = DB::table('questions')
            ->where('qname', $row[1])
            ->where('type', 1)
            ->first();
        
            if (!is_null($existingquestion)) {
                continue; 
            }
            Question::create([

                'qname' => $row[0],
                'qoption1'=> $row[1],
                'qoption2'=> $row[2],
                'qoption3'=> $row[3],
                'qoption4'=> $row[4],
                'type'    =>$type,
                'term'    =>1,
            ]);
        }
       

    }
}
