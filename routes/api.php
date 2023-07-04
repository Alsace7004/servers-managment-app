<?php

use Carbon\Carbon;
use App\Models\Domaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\OutilController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\TypeOutilController;
use App\Http\Controllers\TypeStaffController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\PermmissionController;
use App\Http\Controllers\CategorieServeurController;
use App\Http\Controllers\CategoriePermissionController;
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


//Broadcast::routes(['middleware' => ['auth:sanctum']]);

Route::post("login", [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    //logout
    Route::post("logout", [AuthController::class, 'logout'])->name('logout');
    Route::get('user', [UserController::class, 'getAuthUserInfo']);
    Route::get('getAllUsers', [UserController::class, 'userList']);
    Route::get('getUserRoleAndPermission/{user}', [UserController::class, 'showUser']);
    //Others    
    Route::apiResource('roles', RoleController::class);
    Route::get('getRoleAndPermission/{role}', [RoleController::class, 'showRole']);
    Route::get('getAllRoles', [RoleController::class, 'roleList']);
    Route::get('getAllStaffRoles', [RoleController::class, 'staffRoleList']);
    //Users
    Route::apiResource('users', UserController::class);
    //Permissions
    Route::apiResource('permissions', PermmissionController::class);
    Route::get('getAllPermissions', [PermmissionController::class, 'permissionList']);
    //Servers
    Route::apiResource('servers', ServerController::class);
    Route::get('getAllServers', [ServerController::class, 'serverList']);
    Route::get("getCountServers", [ServerController::class, 'getCountServers']);
    Route::get("getExpireServer", [ServerController::class, 'getExpireServer']);
    //Domaines
    Route::apiResource('domaines', DomaineController::class);
    Route::get("getCountDomaines", [DomaineController::class, 'getCountDomaines']);
    Route::get("getExpireDomaines", [DomaineController::class, 'getExpireDomaines']);
    //Departements
    Route::apiResource('departements', DepartementController::class);
    Route::get('getAllDepartements', [DepartementController::class, 'departementList']); //
    Route::get("getCountDepartements", [DepartementController::class, 'getCountDepartements']);
    //Type de Staff
    Route::apiResource('typeStaff', TypeStaffController::class);
    //call This Specific User
    Route::post('callThisUser/{staff}', [StaffController::class,'callThisUser']); //
    //end call for this specific user
    Route::post('endCallForThisUser/{staff}', [StaffController::class,'endCallForThisUser']); //
    Route::get('getAllTypeStaff', [TypeStaffController::class, 'typeStaffList']); //
    //Staff
    Route::apiResource('staff', StaffController::class);
    Route::put("updateStaffPassword/{id}", [StaffController::class, 'updateStaffPassword']);
    Route::get("getCountStaffs", [StaffController::class, 'getCountStaffs']);
    //Get Auth User Permission And Role
    Route::get('/get-permissions', [PermmissionController::class, 'getAuthUserPermissionAndRole']);
    //categorie_permissions
    Route::apiResource('categorie_permissions', CategoriePermissionController::class);
    //categorie_serveurs
    Route::apiResource('categorie_serveurs', CategorieServeurController::class);
    //type_outils
    Route::apiResource('type_outils', TypeOutilController::class);
    Route::get("getTypeOutils", [TypeOutilController::class, 'getTypeOutils']);
    //outils
    Route::apiResource('outils', OutilController::class);
    //
    Route::get("getDepartementFriends", [DepartementController::class, 'getDepartementFriends']);
    Route::get("getSelectedUser/{id}", [StaffController::class, 'getSelectedUserInfo']);
    Route::post("sendMessage", [MessageController::class, 'sendMessage']);
    Route::get("fetchConversationMessages", [MessageController::class, 'fetchMessages']);
    //mettre à jour les informations du profile
    Route::put('profiles/userProfile/{user}',[UserController::class,'updateProfileInfo']);
   
});

/************************************************************************************************/
/*************************For new permissions****************************************************/
/************************************************************************************************/
Route::get("elements/{the_guard}", [RoleController::class, 'getUtilisateurRole']);
Route::get("getGuardName/{id}", [RoleController::class, 'getThisGuardName']);

Route::get('/monTest', function (Request $request) {
    //return "Salut la mifa";
    //{{Auth::guard("web")->user()}}
    return Auth::guard("web")->user();
});
/***********************************************************************/
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', function(Request $request) {
        return auth()->user();
    });
    Route::post('/auth/logout', [AuthController::class, 'logout']);
});



Broadcast::routes(['middleware' => ['auth:sanctum']]);