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
        //88-48-28
        $categorie_permissions = [
            ['categorie_permission_name'=>'utilisateurs'],  //1
            ['categorie_permission_name'=>'roles'],         //2
            ['categorie_permission_name'=>'staff'],         //3
            ['categorie_permission_name'=>'type_de_staff'], //4
            ['categorie_permission_name'=>'departements'],  //5
            ['categorie_permission_name'=>'domaines'],      //6
            ['categorie_permission_name'=>'serveurs'],      //7
            ['categorie_permission_name'=>'outils'],        //8
            ['categorie_permission_name'=>'typeOutils'],    //9
        ];
        foreach ($categorie_permissions as $p) {
            CategoriePermission::create($p);
        }
        //
        $permissions = [
            /******************for-web************************/
            //users
            ['name'=>'user-list',               'guard_name'=>'web','slug'=>'liste utilisateurs',           'categorie_permission_id '=>'1'],
            ['name'=>'user-create',             'guard_name'=>'web','slug'=>'creation utilisateurs',        'categorie_permission_id '=>'1'],
            ['name'=>'user-edit',               'guard_name'=>'web','slug'=>'edition utilisateurs',         'categorie_permission_id '=>'1'],
            ['name'=>'user-delete',             'guard_name'=>'web','slug'=>'suppretion utilisateurs',      'categorie_permission_id '=>'1'],
            //roles
            ['name'=>'role-list',               'guard_name'=>'web','slug'=>'liste de role',                'categorie_permission_id '=>'2'],
            ['name'=>'role-create',             'guard_name'=>'web','slug'=>'creation de role',             'categorie_permission_id '=>'2'],
            ['name'=>'role-view',               'guard_name'=>'web','slug'=>'voire role',                   'categorie_permission_id '=>'2'],
            ['name'=>'role-edit',               'guard_name'=>'web','slug'=>'edition de role',              'categorie_permission_id '=>'2'],
            ['name'=>'role-delete',             'guard_name'=>'web','slug'=>'suppretion de role',           'categorie_permission_id '=>'2'],
            //staff
            ['name'=>'staff-list',              'guard_name'=>'web','slug'=>'liste de staff',               'categorie_permission_id '=>'3'],
            ['name'=>'staff-create',            'guard_name'=>'web','slug'=>'creation de staff',            'categorie_permission_id '=>'3'],
            ['name'=>'staff-edit',              'guard_name'=>'web','slug'=>'edition de staff',             'categorie_permission_id '=>'3'],
            ['name'=>'staff-delete',            'guard_name'=>'web','slug'=>'suppretion de staff',          'categorie_permission_id '=>'3'],
            ['name'=>'staff-total-actif',       'guard_name'=>'web','slug'=>'nombre de staff actif',        'categorie_permission_id '=>'3'],
            //typeStaff
            ['name'=>'typeStaff-list',          'guard_name'=>'web','slug'=>'liste de type staff',          'categorie_permission_id '=>'4'],
            ['name'=>'typeStaff-create',        'guard_name'=>'web','slug'=>'creation de type staff',       'categorie_permission_id '=>'4'],
            ['name'=>'typeStaff-edit',          'guard_name'=>'web','slug'=>'edition de type staff',        'categorie_permission_id '=>'4'],
            ['name'=>'typeStaff-delete',        'guard_name'=>'web','slug'=>'suppretion de type staff',     'categorie_permission_id '=>'4'],
             //departements
            ['name'=>'departement-list',        'guard_name'=>'web','slug'=>'liste de departement',         'categorie_permission_id '=>'5'],
            ['name'=>'departement-create',      'guard_name'=>'web','slug'=>'creation de departement',      'categorie_permission_id '=>'5'],
            ['name'=>'departement-edit',        'guard_name'=>'web','slug'=>'edition de departement',       'categorie_permission_id '=>'5'],
            ['name'=>'departement-delete',      'guard_name'=>'web','slug'=>'suppretion de departement',    'categorie_permission_id '=>'5'],
            ['name'=>'departement-total-actif', 'guard_name'=>'web','slug'=>'nombre de departement actif',  'categorie_permission_id '=>'5'],
             //domaines
            ['name'=>'domaine-list',            'guard_name'=>'web','slug'=>'liste de domaine',             'categorie_permission_id '=>'6'],
            ['name'=>'domaine-create',          'guard_name'=>'web','slug'=>'creation de domaine',          'categorie_permission_id '=>'6'],
            ['name'=>'domaine-view',            'guard_name'=>'web','slug'=>'voir domaine',                 'categorie_permission_id '=>'6'],
            ['name'=>'domaine-edit',            'guard_name'=>'web','slug'=>'edition de domaine',           'categorie_permission_id '=>'6'],
            ['name'=>'domaine-delete',          'guard_name'=>'web','slug'=>'suppretion de domaine',        'categorie_permission_id '=>'6'],
            ['name'=>'domaine-total',           'guard_name'=>'web','slug'=>'nombre de domaine',            'categorie_permission_id '=>'6'],
            ['name'=>'domaine-expire',          'guard_name'=>'web','slug'=>'nombre domaine expire',        'categorie_permission_id '=>'6'],
            //servers
            ['name'=>'server-list',             'guard_name'=>'web','slug'=>'liste des serveurs',           'categorie_permission_id '=>'7'],
            ['name'=>'server-create',           'guard_name'=>'web','slug'=>'creation de serveur',          'categorie_permission_id '=>'7'],
            ['name'=>'server-view',             'guard_name'=>'web','slug'=>'voir serveur',                 'categorie_permission_id '=>'7'],
            ['name'=>'server-edit',             'guard_name'=>'web','slug'=>'edition de serveur',           'categorie_permission_id '=>'7'],
            ['name'=>'server-delete',           'guard_name'=>'web','slug'=>'suppretion de serveur',        'categorie_permission_id '=>'7'],
            ['name'=>'serveur-total',           'guard_name'=>'web','slug'=>'nombre de serveur',            'categorie_permission_id '=>'7'],
            ['name'=>'serveur-expire',          'guard_name'=>'web','slug'=>'nombre serveur expire',        'categorie_permission_id '=>'7'],
            //outils 16-03-2023
            ['name'=>'outil-list',              'guard_name'=>'web','slug'=>"liste des outils",             'categorie_permission_id '=>'8'],
            ['name'=>'outil-create',            'guard_name'=>'web','slug'=>"creation d'un outil",          'categorie_permission_id '=>'8'],
            ['name'=>'outil-view',              'guard_name'=>'web','slug'=>"voir outil",                   'categorie_permission_id '=>'8'],
            ['name'=>'outil-edit',              'guard_name'=>'web','slug'=>"edition d'un outil",           'categorie_permission_id '=>'8'],
            ['name'=>'outil-delete',            'guard_name'=>'web','slug'=>"suppretion d'un outil",        'categorie_permission_id '=>'8'],
            //typeOutils 16-03-2023
            ['name'=>'typeOutil-list',          'guard_name'=>'web','slug'=>"liste des type d'outils",      'categorie_permission_id '=>'9'],
            ['name'=>'typeOutil-create',        'guard_name'=>'web','slug'=>"creation de type d'outils",    'categorie_permission_id '=>'9'],
            ['name'=>'typeOutil-edit',          'guard_name'=>'web','slug'=>"edition du type d'outil",      'categorie_permission_id '=>'9'],
            ['name'=>'typeOutil-delete',        'guard_name'=>'web','slug'=>"suppretion du type d'outil",   'categorie_permission_id '=>'9'],
            
            /*************************************************for-staffs**************************************************************/
            //staff
            ['name'=>'staff-list',              'guard_name'=>'staffs','slug'=>'liste de staff',                'categorie_permission_id '=>'3'],
            ['name'=>'staff-create',            'guard_name'=>'staffs','slug'=>'creation de staff',             'categorie_permission_id '=>'3'],
            ['name'=>'staff-edit',              'guard_name'=>'staffs','slug'=>'edition de staff',              'categorie_permission_id '=>'3'],
            ['name'=>'staff-delete',            'guard_name'=>'staffs','slug'=>'suppretion de staff',           'categorie_permission_id '=>'3'],
            ['name'=>'staff-total-actif',       'guard_name'=>'staffs','slug'=>'nombre de staff actif',         'categorie_permission_id '=>'3'],
            //typeStaff
            ['name'=>'typeStaff-list',          'guard_name'=>'staffs','slug'=>'liste de type staff',           'categorie_permission_id '=>'4'],
            ['name'=>'typeStaff-create',        'guard_name'=>'staffs','slug'=>'creation de type staff',        'categorie_permission_id '=>'4'],
            ['name'=>'typeStaff-edit',          'guard_name'=>'staffs','slug'=>'edition de type staff',         'categorie_permission_id '=>'4'],
            ['name'=>'typeStaff-delete',        'guard_name'=>'staffs','slug'=>'suppretion de type staff',      'categorie_permission_id '=>'4'],
            //departements
            ['name'=>'departement-list',        'guard_name'=>'staffs','slug'=>'liste de departement',          'categorie_permission_id '=>'5'],
            ['name'=>'departement-create',      'guard_name'=>'staffs','slug'=>'creation de departement',       'categorie_permission_id '=>'5'],
            ['name'=>'departement-edit',        'guard_name'=>'staffs','slug'=>'edition de departement',        'categorie_permission_id '=>'5'],
            ['name'=>'departement-delete',      'guard_name'=>'staffs','slug'=>'suppretion de departement',     'categorie_permission_id '=>'5'],
            ['name'=>'departement-total-actif', 'guard_name'=>'staffs','slug'=>'nombre de departement actif',   'categorie_permission_id '=>'5'],
            //domaines
            ['name'=>'domaine-list',            'guard_name'=>'staffs','slug'=>'liste de domaine',              'categorie_permission_id '=>'6'],
            ['name'=>'domaine-create',          'guard_name'=>'staffs','slug'=>'creation de domaine',           'categorie_permission_id '=>'6'],
            ['name'=>'domaine-view',            'guard_name'=>'staffs','slug'=>'voir domaine',                  'categorie_permission_id '=>'6'],
            ['name'=>'domaine-edit',            'guard_name'=>'staffs','slug'=>'edition de domaine',            'categorie_permission_id '=>'6'],
            ['name'=>'domaine-delete',          'guard_name'=>'staffs','slug'=>'suppretion de domaine',         'categorie_permission_id '=>'6'],
            ['name'=>'domaine-total',           'guard_name'=>'staffs','slug'=>'nombre de domaine',             'categorie_permission_id '=>'6'],
            ['name'=>'domaine-expire',          'guard_name'=>'staffs','slug'=>'nombre domaine expire',         'categorie_permission_id '=>'6'],
            //servers
            ['name'=>'server-list',             'guard_name'=>'staffs','slug'=>'liste des serveurs',            'categorie_permission_id '=>'7'],
            ['name'=>'server-create',           'guard_name'=>'staffs','slug'=>'creation de serveur',           'categorie_permission_id '=>'7'],
            ['name'=>'server-view',             'guard_name'=>'staffs','slug'=>'voir serveur',                  'categorie_permission_id '=>'7'],
            ['name'=>'server-edit',             'guard_name'=>'staffs','slug'=>'edition de serveur',            'categorie_permission_id '=>'7'],
            ['name'=>'server-delete',           'guard_name'=>'staffs','slug'=>'suppretion de serveur',         'categorie_permission_id '=>'7'],
            ['name'=>'serveur-total',           'guard_name'=>'staffs','slug'=>'nombre de serveur',             'categorie_permission_id '=>'7'],
            ['name'=>'serveur-expire',          'guard_name'=>'staffs','slug'=>'nombre serveur expire',         'categorie_permission_id '=>'7'],
            //outils 16-03-2023
            ['name'=>'outil-list',              'guard_name'=>'staffs','slug'=>"liste des outils",              'categorie_permission_id '=>'8'],
            ['name'=>'outil-create',            'guard_name'=>'staffs','slug'=>"creation d'un outil",           'categorie_permission_id '=>'8'],
            ['name'=>'outil-view',              'guard_name'=>'staffs','slug'=>"voir outil",                    'categorie_permission_id '=>'8'],
            ['name'=>'outil-edit',              'guard_name'=>'staffs','slug'=>"edition d'un outil",            'categorie_permission_id '=>'8'],
            ['name'=>'outil-delete',            'guard_name'=>'staffs','slug'=>"suppretion d'un outil",         'categorie_permission_id '=>'8'],
            //typeOutils 16-03-2023
            ['name'=>'typeOutil-list',          'guard_name'=>'staffs','slug'=>"liste des type d'outils",       'categorie_permission_id '=>'9'],
            ['name'=>'typeOutil-create',        'guard_name'=>'staffs','slug'=>"creation de type d'outils",     'categorie_permission_id '=>'9'],
            ['name'=>'typeOutil-edit',          'guard_name'=>'staffs','slug'=>"edition du type d'outil",       'categorie_permission_id '=>'9'],
            ['name'=>'typeOutil-delete',        'guard_name'=>'staffs','slug'=>"suppretion du type d'outil",    'categorie_permission_id '=>'9'],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        //
    }
}
