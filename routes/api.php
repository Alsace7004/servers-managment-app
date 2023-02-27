<?php

use Carbon\Carbon;
use App\Models\Domaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PermmissionController;
use App\Http\Controllers\DepartementController;

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

Route::middleware('auth:sanctum')->group(function () {
    //logout
    Route::post("logout",[AuthController::class,'logout'])->name('logout');
    Route::get('user', [UserController::class,'getAuthUserInfo']);
    Route::get('getAllUsers',[UserController::class,'userList']);
    Route::get('getUserRoleAndPermission/{user}',[UserController::class,'showUser']);
    //Others    
    Route::apiResource('roles',RoleController::class);
    Route::get('getRoleAndPermission/{role}',[RoleController::class,'showRole']);
    Route::get('getAllRoles',[RoleController::class,'roleList']);
    //
    Route::apiResource('users',UserController::class);
    Route::apiResource('permissions',PermmissionController::class);
    Route::get('getAllPermissions',[PermmissionController::class,'permissionList']);
    Route::apiResource('servers',ServerController::class);
    Route::get('getAllServers',[ServerController::class,'serverList']);
    //Domaines
    Route::apiResource('domaines',DomaineController::class);
    //Departements
    Route::apiResource('departements',DepartementController::class);

    Route::get('/get-permissions',[PermmissionController::class,'getAuthUserPermissionAndRole']);
});





