<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()

    {
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(YearsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(StudentSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
