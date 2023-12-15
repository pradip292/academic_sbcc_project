<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    
    public function run(): void
    {
         $student=[ 'sname' => 'test',
            'sprn' => 'uit0000',
            'sdob' => '2000/10/22',
            'sdepart' => 'Information Technology',
            'sclass' => 'TY',
            'sdiv'=>'A',
            'semail' =>'example@gmail.com',
            'sroll' =>'10',
            

    ];
    DB::table('students')->insert($student);
}

}
            
           
            
       
    