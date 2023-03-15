<?php

use Carbon\Carbon;
use App\Models\Domaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\TypeStaffController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\PermmissionController;
use App\Http\Controllers\CategoriePermissionController;
use App\Http\Controllers\CategorieServeurController;
use App\Http\Controllers\TypeOutilController;
use App\Http\Controllers\OutilController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //return $request->user();
    //return "salut";
    Route::apiResource('roles',RoleController::class);
}); */



Route::post("login",[AuthController::class,'login'])->name('login');
//Route::middleware('auth:sanctum')->group(function () {
    
Route::middleware('web')->group(function () {
//Route::middleware('web')->group(function () {
//Route::middleware('auth:web')->group(function () {
    //logout
    Route::post("logout",[AuthController::class,'logout'])->name('logout');
    Route::get('user', [UserController::class,'getAuthUserInfo']);
    Route::get('getAllUsers',[UserController::class,'userList']);
    Route::get('getUserRoleAndPermission/{user}',[UserController::class,'showUser']);
    //Others    
    Route::apiResource('roles',RoleController::class);
    Route::get('getRoleAndPermission/{role}',[RoleController::class,'showRole']);
    Route::get('getAllRoles',[RoleController::class,'roleList']);
    Route::get('getAllStaffRoles',[RoleController::class,'staffRoleList']);
    //Users
    Route::apiResource('users',UserController::class);
    //Permissions
    Route::apiResource('permissions',PermmissionController::class);
    Route::get('getAllPermissions',[PermmissionController::class,'permissionList']);
    //Servers
    Route::apiResource('servers',ServerController::class);
    Route::get('getAllServers',[ServerController::class,'serverList']);
    Route::get("getCountServers",[ServerController::class,'getCountServers']);
    Route::get("getExpireServer",[ServerController::class,'getExpireServer']);
    //Domaines
    Route::apiResource('domaines',DomaineController::class);
    Route::get("getCountDomaines",[DomaineController::class,'getCountDomaines']);
    Route::get("getExpireDomaines",[DomaineController::class,'getExpireDomaines']);
    //Departements
    Route::apiResource('departements',DepartementController::class);
    Route::get('getAllDepartements',[DepartementController::class,'departementList']);//
    Route::get("getCountDepartements",[DepartementController::class,'getCountDepartements']);
    //Type de Staff
    Route::apiResource('typeStaff',TypeStaffController::class);
    Route::get('getAllTypeStaff',[TypeStaffController::class,'typeStaffList']);//
    //Staff
    Route::apiResource('staff',StaffController::class);
    Route::put("updateStaffPassword/{id}",[StaffController::class,'updateStaffPassword']);
    Route::get("getCountStaffs",[StaffController::class,'getCountStaffs']);
    //Get Auth User Permission And Role
    Route::get('/get-permissions',[PermmissionController::class,'getAuthUserPermissionAndRole']);
    //categorie_permissions
    Route::apiResource('categorie_permissions',CategoriePermissionController::class);
    //categorie_serveurs
    Route::apiResource('categorie_serveurs',CategorieServeurController::class);
    //type_outils
    Route::apiResource('type_outils',TypeOutilController::class);
    Route::get("getTypeOutils",[TypeOutilController::class,'getTypeOutils']);
    //outils
    Route::apiResource('outils',OutilController::class);
    
});

//
Route::get("/staffPermission",function(){
    $permissions = [
        //users
        /*
            ['name'=>'user-list',          'guard_name'=>'staffs','slug'=>'liste utilisateurs'],
            ['name'=>'user-create',        'guard_name'=>'staffs','slug'=>'creation utilisateurs'],
            ['name'=>'user-edit',          'guard_name'=>'staffs','slug'=>'edition utilisateurs'],
            ['name'=>'user-delete',        'guard_name'=>'staffs','slug'=>'suppretion utilisateurs'],
            //roles
            ['name'=>'role-list',          'guard_name'=>'staffs','slug'=>'liste de role'],
            ['name'=>'role-create',        'guard_name'=>'staffs','slug'=>'creation de role'],
            ['name'=>'role-view',          'guard_name'=>'staffs','slug'=>'voire role'],
            ['name'=>'role-edit',          'guard_name'=>'staffs','slug'=>'edition de role'],
            ['name'=>'role-delete',        'guard_name'=>'staffs','slug'=>'suppretion de role'], 
        */
        //servers
        ['name'=>'server-list',        'guard_name'=>'staffs','slug'=>'liste des serveurs'],
        ['name'=>'server-create',      'guard_name'=>'staffs','slug'=>'creation de serveur'],
        ['name'=>'server-view',        'guard_name'=>'staffs','slug'=>'voir serveur'],
        ['name'=>'server-edit',        'guard_name'=>'staffs','slug'=>'edition de serveur'],
        ['name'=>'server-delete',      'guard_name'=>'staffs','slug'=>'suppretion de serveur'],
        ['name'=>'serveur-total',      'guard_name'=>'staffs','slug'=>'nombre de serveur'],
        ['name'=>'serveur-expire',     'guard_name'=>'staffs','slug'=>'nombre serveur expire'],
        //domaines
        ['name'=>'domaine-list',       'guard_name'=>'staffs','slug'=>'liste de domaine'],
        ['name'=>'domaine-create',     'guard_name'=>'staffs','slug'=>'creation de domaine'],
        ['name'=>'domaine-view',       'guard_name'=>'staffs','slug'=>'voir domaine'],
        ['name'=>'domaine-edit',       'guard_name'=>'staffs','slug'=>'edition de domaine'],
        ['name'=>'domaine-delete',     'guard_name'=>'staffs','slug'=>'suppretion de domaine'],
        ['name'=>'domaine-total',      'guard_name'=>'staffs','slug'=>'nombre de domaine'],
        ['name'=>'domaine-expire',     'guard_name'=>'staffs','slug'=>'nombre domaine expire'],
        //departements
        ['name'=>'departement-list',        'guard_name'=>'staffs','slug'=>'liste de departement'],
        ['name'=>'departement-create',      'guard_name'=>'staffs','slug'=>'creation de departement'],
        ['name'=>'departement-edit',        'guard_name'=>'staffs','slug'=>'edition de departement'],
        ['name'=>'departement-delete',      'guard_name'=>'staffs','slug'=>'suppretion de departement'],
        ['name'=>'departement-total-actif', 'guard_name'=>'staffs','slug'=>'nombre de departement actif'],
        //staff
        ['name'=>'staff-list',         'guard_name'=>'staffs','slug'=>'liste de staff'],
        ['name'=>'staff-create',       'guard_name'=>'staffs','slug'=>'creation de staff'],
        ['name'=>'staff-edit',         'guard_name'=>'staffs','slug'=>'edition de staff'],
        ['name'=>'staff-delete',       'guard_name'=>'staffs','slug'=>'suppretion de staff'],
        ['name'=>'staff-total-actif',  'guard_name'=>'staffs','slug'=>'nombre de staff actif'],
        //typeStaff
        ['name'=>'typeStaff-list',     'guard_name'=>'staffs','slug'=>'liste de type staff'],
        ['name'=>'typeStaff-create',   'guard_name'=>'staffs','slug'=>'creation de type staff'],
        ['name'=>'typeStaff-edit',     'guard_name'=>'staffs','slug'=>'edition de type staff'],
        ['name'=>'typeStaff-delete',   'guard_name'=>'staffs','slug'=>'suppretion de type staff'],
    ];
    foreach ($permissions as $permission) {
        Permission::create($permission);
    }
});

Route::get("elements/{the_guard}",[RoleController::class,'getUtilisateurRole']);
Route::get("getGuardName/{id}",[RoleController::class,'getThisGuardName']);



