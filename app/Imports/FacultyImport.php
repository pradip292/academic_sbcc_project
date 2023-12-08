<?php

namespace App\Imports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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
        foreach ($rows as $index => $row) {
            if ($index === 0) {
                continue; 
            }
            $existingfaculty = DB::table('users')
            ->where('name', $row[1])
            ->where('is_approved', 1)
            ->first();
        
            if (!is_null($existingfaculty)) {
                continue; 
            }

            $user=User::create([
                'name' => 'teacher',
                'email'=> $row[2],
                'password' => Hash::make('123456'),
                 'is_approved' => 1,
                
            ]);
            $role = Role::findByName('teacher'); // Replace 'role_name' with the name of the existing role
            $user->assignRole($role);
        }

    }
}
