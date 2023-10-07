<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *@return void
     */
    public function run()
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        $testPermission = [
            ['name' => 'dashboard'],
        ];

        foreach ($testPermission as $item) {
            Permission::firstOrCreate($item);
        }
        $questionPermission = [
            ['name' => 'view_question'],
            ['name' => 'upload_question'],
            ['name' => 'add_queston'],
        ];
        foreach ($questionPermission as $item) {
            Permission::firstOrCreate($item);
        }

        $adminRole->syncPermissions(Permission::all());
        $user = User::where('email', 'admin@gmail.com')->first();
        $user->assignRole('admin');
    }

}