<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuth\RegisterApiController;
use App\Http\Controllers\ApiAuth\LogoutApiController;
use App\Http\Controllers\ApiAuth\LoginApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('mobile/register',[RegisterApiController::class, 'create']);
Route::delete('mobile/logout',[LogoutApiController::class, 'logoutDevice'])->middleware('auth:sanctum');
Route::post('mobile/login',[LoginApiController::class, 'loginDevice']);