<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        /***********************************************************/
        $user_admin = User::create([
            'name'      => 'admin', 
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('123456789')
        ]);
        $user_secretaire = User::create([
            'name'      => 'secretaire', 
            'email'     => 'secretaire@secretaire.com',
            'password'  => bcrypt('123456789')
        ]);
        $user_utilisateur = User::create([
            'name'      => 'utilisateur', 
            'email'     => 'utilisateur@utilisateur.com',
            'password'  => bcrypt('123456789')
        ]);
        /************************************************************/
        $role_admin         = Role::create(['name' => 'Admin']);
        $role_secretaire    = Role::create(['name' => 'Secretaire']);
        $role_utilisateur   = Role::create(['name' => 'Utilisateur']);
        /************************************************************/
        $permissions = Permission::pluck('id','id')->all();
        $role_admin->syncPermissions($permissions); // asign permission to role admin
        /************************************************************/
        $user_admin->assignRole([$role_admin->id]);
        $user_secretaire->assignRole([$user_secretaire->id]);
        $user_utilisateur->assignRole([$user_utilisateur->id]);
        /************************************************************/
        /* $role_admin->givePermissionTo([
            $server_create,
            $server_list,
            $server_update,
            $server_view,
            $server_delete
        ]);
        //assign permission to role_secretaire
        $role_secretaire->givePermissionTo([
            $server_list,
        ]);
        //assign permission to role_utilisateur
        $role_utilisateur->givePermissionTo([
            $server_view,
        ]); */
        /************************************************************/
    }
}
