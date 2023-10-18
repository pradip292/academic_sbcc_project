<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('years')->insert([
            ['Year' => 'FY'],
            ['Year' => 'SY'],
            ['Year' => 'TY'],
            ['Year' => 'B.Tech'],
        ]);
    }
}
