<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // You can adjust this data based on your requirements
        $departments = [
            ['dept_name' => 'Computer Engineering'],
            ['dept_name' => 'Information Technology'],
            ['dept_name' => 'Electronics and Computer Engineering'],
            ['dept_name' => 'Civil Engineering'],
            ['dept_name' => 'Mechanical Engineering'],
            ['dept_name' => 'Electrical Engineering'],
            ['dept_name' => 'Structural Engineering'],
            ['dept_name' => 'Mechatronics Engineering'],
            
            
            // Add more departments if needed
        ];

        // Insert the data into the "departments" table
        DB::table('departments')->insert($departments);


        foreach ($departments as $department) {
            $departmentName = $department['dept_name'];

            // Get all years from the "years" table
            $years = DB::table('years')->pluck('year');

            // Define divisions
            $divisions = ['A', 'B'];

            // Seed classes for each department, year, and division combination
            foreach ($years as $year) {
                foreach ($divisions as $division) {
                    $className = "Class {$year}{$division}";

                    // Insert the classes into the "classes" table
                    DB::table('classes')->insert([
                        'division' => $className,
                        'year' => $year,
                        'division' => $division,
                        'dept_name' => $departmentName,
                        // Add other necessary fields
                    ]);
                }
            }
        }
    }
}
