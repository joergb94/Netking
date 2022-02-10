<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuth\RegisterApiController;
use App\Http\Controllers\ApiAuth\LogoutApiController;
use App\Http\Controllers\ApiAuth\LoginApiController;
use App\Http\Controllers\Api\HomeApiController;
use App\Http\Controllers\Api\CardController;
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
Route::post('mobile/test',[LoginApiController::class, 'test']);

//home
Route::get('mobile/home', [HomeApiController::class, 'index']);

Route::get('card/item', [CardController::class, 'card_item']);
Route::get('card/{id}', [CardController::class, 'get_data_keypl']);
Route::get('keypl', [CardController::class, 'get_keypls'])->middleware('auth:sanctum');