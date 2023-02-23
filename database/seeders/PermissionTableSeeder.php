<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            
            'server-list',
            'server-create',
            'server-edit',
            'server-delete',

            'domaine-list',
            'domaine-create',
            'domaine-edit',
            'domaine-delete',
        ];
      
        foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
        }
    }
}
