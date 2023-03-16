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

/************************************************************************************************/
/*************************For new permissions***********************************************************************/
/*Route::get("/outilsPermission",function(){
    $permissions = [
            //outils
            ['name'=>'outil-list',              'guard_name'=>'web','slug'=>'liste des outils',                 'categorie_permission_id '=>8],
            ['name'=>'outil-create',            'guard_name'=>'web','slug'=>"creation d'un outil",              'categorie_permission_id '=>8],
            ['name'=>'outil-view',              'guard_name'=>'web','slug'=>'voir outil',                       'categorie_permission_id '=>8],
            ['name'=>'outil-edit',              'guard_name'=>'web','slug'=>"edition d'un outil",               'categorie_permission_id '=>8],
            ['name'=>'outil-delete',            'guard_name'=>'web','slug'=>"suppretion d'un outil",            'categorie_permission_id '=>8],
            //typeOutils
            ['name'=>'typeOutil-list',          'guard_name'=>'web','slug'=>"liste des type d'outils",          'categorie_permission_id '=>9],
            ['name'=>'typeOutil-create',        'guard_name'=>'web','slug'=>"creation de type d'outils",        'categorie_permission_id '=>9],
            ['name'=>'typeOutil-edit',          'guard_name'=>'web','slug'=>"edition du type d'outil",          'categorie_permission_id '=>9],
            ['name'=>'typeOutil-delete',        'guard_name'=>'web','slug'=>"suppretion du type d'outil",       'categorie_permission_id '=>9],
            //outils
            ['name'=>'outil-list',              'guard_name'=>'staffs','slug'=>'liste des outils',              'categorie_permission_id '=>8],
            ['name'=>'outil-create',            'guard_name'=>'staffs','slug'=>"creation d'un outil",           'categorie_permission_id '=>8],
            ['name'=>'outil-view',              'guard_name'=>'staffs','slug'=>'voir outil',                    'categorie_permission_id '=>8],
            ['name'=>'outil-edit',              'guard_name'=>'staffs','slug'=>"edition d'un outil",            'categorie_permission_id '=>8],
            ['name'=>'outil-delete',            'guard_name'=>'staffs','slug'=>"suppretion d'un outil",         'categorie_permission_id '=>8],
            //typeOutils
            ['name'=>'typeOutil-list',          'guard_name'=>'staffs','slug'=>"liste des type d'outils",       'categorie_permission_id '=>9],
            ['name'=>'typeOutil-create',        'guard_name'=>'staffs','slug'=>"creation de type d'outils",     'categorie_permission_id '=>9],
            ['name'=>'typeOutil-edit',          'guard_name'=>'staffs','slug'=>"edition du type d'outil",       'categorie_permission_id '=>9],
            ['name'=>'typeOutil-delete',        'guard_name'=>'staffs','slug'=>"suppretion du type d'outil",    'categorie_permission_id '=>9],
            
    ];
    foreach ($permissions as $permission) {
        Permission::create($permission);
    }
});*/
/************************************************************************************************/
Route::get("elements/{the_guard}",[RoleController::class,'getUtilisateurRole']);
Route::get("getGuardName/{id}",[RoleController::class,'getThisGuardName']);



