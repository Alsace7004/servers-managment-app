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
            'role-view',
            'role-edit',
            'role-delete',
            
            'server-list',
            'server-create',
            'server-view',
            'server-edit',
            'server-delete',

            'domaine-list',
            'domaine-create',
            'domaine-view',
            'domaine-edit',
            'domaine-delete',

            'departement-list',
            'departement-create',
            'departement-edit',
            'departement-delete',

            'staff-list',
            'staff-create',
            'staff-edit',
            'staff-delete',

            'typeStaff-list',
            'typeStaff-create',
            'typeStaff-edit',
            'typeStaff-delete',
        ];
        //29 Permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
