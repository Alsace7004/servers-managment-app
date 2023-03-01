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
        /*$permissions = [
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
            'server-view',
            'server-edit',
            'server-delete',

            'domaine-list',
            'domaine-create',
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
        ];*/
        $datas = [
            ['name'=>'user-list',   'guard_name'=>'liste utilisateurs'],
            ['name'=>'user-create', 'guard_name'=>'creation utilisateurs'],
            ['name'=>'user-edit',   'guard_name'=>'edition utilisateurs'],
            ['name'=>'user-delete', 'guard_name'=>'suppretion utilisateurs'],
        ];
        //Permission::create(['name'=>'name','guard_name'=>'guard_name']);
        foreach ($datas as $data) {
            Permission::create($data);
        }
    }
}
