<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriePermission;
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
        $categorie_permissions = [
            ['categorie_permission_name'=>'utilisateurs'],  //1
            ['categorie_permission_name'=>'roles'],         //2
            ['categorie_permission_name'=>'staff'],         //3
            ['categorie_permission_name'=>'type_de_staff'], //4
            ['categorie_permission_name'=>'departements'],  //5
            ['categorie_permission_name'=>'domaines'],      //6
            ['categorie_permission_name'=>'serveurs'],      //7
        ];
        foreach ($categorie_permissions as $p) {
            CategoriePermission::create($p);
        }
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
             //departements
            ['name'=>'departement-list',        'guard_name'=>'web','slug'=>'liste de departement'],
            ['name'=>'departement-create',      'guard_name'=>'web','slug'=>'creation de departement'],
            ['name'=>'departement-edit',        'guard_name'=>'web','slug'=>'edition de departement'],
            ['name'=>'departement-delete',      'guard_name'=>'web','slug'=>'suppretion de departement'],
            ['name'=>'departement-total-actif', 'guard_name'=>'web','slug'=>'nombre de departement actif'],
             //domaines
            ['name'=>'domaine-list',            'guard_name'=>'web','slug'=>'liste de domaine'],
            ['name'=>'domaine-create',          'guard_name'=>'web','slug'=>'creation de domaine'],
            ['name'=>'domaine-view',            'guard_name'=>'web','slug'=>'voir domaine'],
            ['name'=>'domaine-edit',            'guard_name'=>'web','slug'=>'edition de domaine'],
            ['name'=>'domaine-delete',          'guard_name'=>'web','slug'=>'suppretion de domaine'],
            ['name'=>'domaine-total',           'guard_name'=>'web','slug'=>'nombre de domaine'],
            ['name'=>'domaine-expire',          'guard_name'=>'web','slug'=>'nombre domaine expire'],
            //servers
            ['name'=>'server-list',             'guard_name'=>'web','slug'=>'liste des serveurs'],
            ['name'=>'server-create',           'guard_name'=>'web','slug'=>'creation de serveur'],
            ['name'=>'server-view',             'guard_name'=>'web','slug'=>'voir serveur'],
            ['name'=>'server-edit',             'guard_name'=>'web','slug'=>'edition de serveur'],
            ['name'=>'server-delete',           'guard_name'=>'web','slug'=>'suppretion de serveur'],
            ['name'=>'serveur-total',           'guard_name'=>'web','slug'=>'nombre de serveur'],
            ['name'=>'serveur-expire',          'guard_name'=>'web','slug'=>'nombre serveur expire'],
            
           
            
            /*************************************************for-staffs**************************************************************/
            //staff
            ['name'=>'staff-list',              'guard_name'=>'staffs','slug'=>'liste de staff'],
            ['name'=>'staff-create',            'guard_name'=>'staffs','slug'=>'creation de staff'],
            ['name'=>'staff-edit',              'guard_name'=>'staffs','slug'=>'edition de staff'],
            ['name'=>'staff-delete',            'guard_name'=>'staffs','slug'=>'suppretion de staff'],
            ['name'=>'staff-total-actif',       'guard_name'=>'staffs','slug'=>'nombre de staff actif'],
            //typeStaff
            ['name'=>'typeStaff-list',          'guard_name'=>'staffs','slug'=>'liste de type staff'],
            ['name'=>'typeStaff-create',        'guard_name'=>'staffs','slug'=>'creation de type staff'],
            ['name'=>'typeStaff-edit',          'guard_name'=>'staffs','slug'=>'edition de type staff'],
            ['name'=>'typeStaff-delete',        'guard_name'=>'staffs','slug'=>'suppretion de type staff'],
            //departements
            ['name'=>'departement-list',        'guard_name'=>'staffs','slug'=>'liste de departement'],
            ['name'=>'departement-create',      'guard_name'=>'staffs','slug'=>'creation de departement'],
            ['name'=>'departement-edit',        'guard_name'=>'staffs','slug'=>'edition de departement'],
            ['name'=>'departement-delete',      'guard_name'=>'staffs','slug'=>'suppretion de departement'],
            ['name'=>'departement-total-actif', 'guard_name'=>'staffs','slug'=>'nombre de departement actif'],
            //domaines
            ['name'=>'domaine-list',            'guard_name'=>'staffs','slug'=>'liste de domaine'],
            ['name'=>'domaine-create',          'guard_name'=>'staffs','slug'=>'creation de domaine'],
            ['name'=>'domaine-view',            'guard_name'=>'staffs','slug'=>'voir domaine'],
            ['name'=>'domaine-edit',            'guard_name'=>'staffs','slug'=>'edition de domaine'],
            ['name'=>'domaine-delete',          'guard_name'=>'staffs','slug'=>'suppretion de domaine'],
            ['name'=>'domaine-total',           'guard_name'=>'staffs','slug'=>'nombre de domaine'],
            ['name'=>'domaine-expire',          'guard_name'=>'staffs','slug'=>'nombre domaine expire'],
            //servers
            ['name'=>'server-list',             'guard_name'=>'staffs','slug'=>'liste des serveurs'],
            ['name'=>'server-create',           'guard_name'=>'staffs','slug'=>'creation de serveur'],
            ['name'=>'server-view',             'guard_name'=>'staffs','slug'=>'voir serveur'],
            ['name'=>'server-edit',             'guard_name'=>'staffs','slug'=>'edition de serveur'],
            ['name'=>'server-delete',           'guard_name'=>'staffs','slug'=>'suppretion de serveur'],
            ['name'=>'serveur-total',           'guard_name'=>'staffs','slug'=>'nombre de serveur'],
            ['name'=>'serveur-expire',          'guard_name'=>'staffs','slug'=>'nombre serveur expire'],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        //
    }
}
