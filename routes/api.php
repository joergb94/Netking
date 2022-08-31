<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuth\RegisterApiController;
use App\Http\Controllers\ApiAuth\LogoutApiController;
use App\Http\Controllers\ApiAuth\LoginApiController;
use App\Http\Controllers\Api\HomeApiController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\GraphicsController;
use App\Http\Controllers\Api\FriendsController;
use App\Http\Controllers\Api\GroupsController;
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
Route::post('mobile/login',[LoginApiController::class, 'loginDevice']);
Route::post('mobile/test',[LoginApiController::class, 'test']);

Route::get('card/item', [CardController::class, 'card_item']);
Route::get('card/{id}', [CardController::class, 'get_data_keypl']);

Route::group(['middleware'=>['auth:sanctum']], function(){

    Route::delete('mobile/logout',[LogoutApiController::class, 'logoutDevice']);

    //home
    Route::get('mobile/home', [HomeApiController::class, 'index']);
    
    //card
    Route::get('keypl', [CardController::class, 'get_keypls']);
    Route::post('card/item/update', [CardController::class, 'update_card_item']);
    Route::post('card/item/create', [CardController::class, 'create_detail']);
    Route::delete('card/item/delete', [CardController::class, 'deleteOrResotore']);
    Route::get('/Keypls/detail', [CardController::class, 'detail']);
    Route::get('keypl/metrics', [CardController::class, 'metrics']);
    Route::get('keypl/metrics/data', [CardController::class, 'get_data_metricas']);
    Route::get('keypl/image/profile', [CardController::class, 'image']);
    Route::post('/kepls/create', [CardController::class, 'store']);
    //profile 
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile/showMembership', [ProfileController::class, 'show_membership']);
    Route::post('/profile/purchase', [ProfileController::class, 'purchase']);
    Route::post('/profile/purchase_extra', [ProfileController::class, 'purchase_extra']);
    Route::get('/profile/edit', [ProfileController::class, 'edit']);
    Route::post('/profile/update', [ProfileController::class, 'update']);
    Route::get('/profile/{id}/user', [ProfileController::class, 'get_user']);
    Route::get('/profile/renovate/{id}', [ProfileController::class, 'renovate']);


    //friends
    Route::post('/friends/follow', [GroupsController::class, 'friendship']); 
    Route::get('/friends', [FriendsController::class, 'index']);
    Route::get('/friends/createGroup', [GroupsController::class, 'create']);
    Route::post('/friends/createGroup', [GroupsController::class, 'store']);
    Route::get('/friends/editGroup', [GroupsController::class, 'edit']);
    Route::post('/friends/editGroup', [GroupsController::class, 'update']);
    Route::delete('/friends/deleteOfGroup', [GroupsController::class, 'delete']);
    Route::get('/friends/addGroup', [GroupsController::class, 'add_to_group']);
    Route::post('/friends/addGroup', [GroupsController::class, 'store_to_group']);
});