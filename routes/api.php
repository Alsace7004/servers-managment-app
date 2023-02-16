<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\PermmissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::get('user', function(){
        return auth()->user();
        //return dd(auth()->user());
    });
    //Others    
    Route::apiResource('roles',RoleController::class);
    //
    Route::apiResource('users',UserController::class);
    Route::apiResource('permissions',PermmissionController::class);
    Route::apiResource('servers',ServerController::class);
    Route::get('/get-permissions', function () {
        return auth()->check()?auth()->user()->jsPermissions():0;
    });
});




