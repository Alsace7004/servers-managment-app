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
            /******************for-web************************/
            //users
            ['name'=>'user-list',               'guard_name'=>'web','slug'=>'liste utilisateurs'],
            ['name'=>'user-create',             'guard_name'=>'web','slug'=>'creation utilisateurs'],
            ['name'=>'user-edit',               'guard_name'=>'web','slug'=>'edition utilisateurs'],
            ['name'=>'user-delete',             'guard_name'=>'web','slug'=>'suppretion utilisateurs'],
            //roles
            ['name'=>'role-list',               'guard_name'=>'web','slug'=>'liste de role'],
            ['name'=>'role-create',             'guard_name'=>'web','slug'=>'creation de role'],
            ['name'=>'role-view',               'guard_name'=>'web','slug'=>'voire role'],
            ['name'=>'role-edit',               'guard_name'=>'web','slug'=>'edition de role'],
            ['name'=>'role-delete',             'guard_name'=>'web','slug'=>'suppretion de role'],
            //servers
            ['name'=>'server-list',             'guard_name'=>'web','slug'=>'liste des serveurs'],
            ['name'=>'server-create',           'guard_name'=>'web','slug'=>'creation de serveur'],
            ['name'=>'server-view',             'guard_name'=>'web','slug'=>'voir serveur'],
            ['name'=>'server-edit',             'guard_name'=>'web','slug'=>'edition de serveur'],
            ['name'=>'server-delete',           'guard_name'=>'web','slug'=>'suppretion de serveur'],
            ['name'=>'serveur-total',           'guard_name'=>'web','slug'=>'nombre de serveur'],
            ['name'=>'serveur-expire',          'guard_name'=>'web','slug'=>'nombre serveur expire'],
            //domaines
            ['name'=>'domaine-list',            'guard_name'=>'web','slug'=>'liste de domaine'],
            ['name'=>'domaine-create',          'guard_name'=>'web','slug'=>'creation de domaine'],
            ['name'=>'domaine-view',            'guard_name'=>'web','slug'=>'voir domaine'],
            ['name'=>'domaine-edit',            'guard_name'=>'web','slug'=>'edition de domaine'],
            ['name'=>'domaine-delete',          'guard_name'=>'web','slug'=>'suppretion de domaine'],
            ['name'=>'domaine-total',           'guard_name'=>'web','slug'=>'nombre de domaine'],
            ['name'=>'domaine-expire',          'guard_name'=>'web','slug'=>'nombre domaine expire'],
            //departements
            ['name'=>'departement-list',        'guard_name'=>'web','slug'=>'liste de departement'],
            ['name'=>'departement-create',      'guard_name'=>'web','slug'=>'creation de departement'],
            ['name'=>'departement-edit',        'guard_name'=>'web','slug'=>'edition de departement'],
            ['name'=>'departement-delete',      'guard_name'=>'web','slug'=>'suppretion de departement'],
            ['name'=>'departement-total-actif', 'guard_name'=>'web','slug'=>'nombre de departement actif'],
            //staff
            ['name'=>'staff-list',              'guard_name'=>'web','slug'=>'liste de staff'],
            ['name'=>'staff-create',            'guard_name'=>'web','slug'=>'creation de staff'],
            ['name'=>'staff-edit',              'guard_name'=>'web','slug'=>'edition de staff'],
            ['name'=>'staff-delete',            'guard_name'=>'web','slug'=>'suppretion de staff'],
            ['name'=>'staff-total-actif',       'guard_name'=>'web','slug'=>'nombre de staff actif'],
            //typeStaff
            ['name'=>'typeStaff-list',          'guard_name'=>'web','slug'=>'liste de type staff'],
            ['name'=>'typeStaff-create',        'guard_name'=>'web','slug'=>'creation de type staff'],
            ['name'=>'typeStaff-edit',          'guard_name'=>'web','slug'=>'edition de type staff'],
            ['name'=>'typeStaff-delete',        'guard_name'=>'web','slug'=>'suppretion de type staff'],
            /******************for-staffs************************/
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        //
    }
}
