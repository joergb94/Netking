<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\GeneralController;
use App\Http\Controllers\web\contacUsController;
use App\Http\Controllers\web\CardController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\ProfileController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contactUs/{id}',[contacUsController::class, 'send_mail']);
Auth::routes();
//home 
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home/deleteOrResotore',[HomeController::class, 'deleteOrResotore']);
Route::post('/contactUs',[HomeController::class, 'deleteOrResotore']);
Route::get('/Kepls/background/{id}', [CardController::class, '']);



//genera 
Route::get('/Kepls/{id}', [CardController::class, 'detail']);


//cards

Route::get('/myKepls', [CardController::class, 'index'])->name('myKepls');
Route::get('/myKepls/create', [CardController::class, 'create']);
Route::get('/myKepls/{id}/edit', [CardController::class, 'edit']);
Route::post('/myKepls/{id}', [CardController::class, 'update']);
Route::get('/myKepls/getCreate', [CardController::class, 'get_create_card']);
Route::delete('/myKepls/{id}', [CardController::class, 'deleteOrResotore']);
Route::post('/myKepls/create/card', [CardController::class, 'store']);
Route::get('/myKepls/background/{id}', [CardController::class, 'getBG']);
Route::post('/myKepls/updateItem/{id}', [CardController::class, 'update_card_item']);
Route::post('/myKepls/updateItemfile/{id}', [CardController::class, 'update_card_item_file']);
Route::post('/myKepls/create/item', [CardController::class, 'create_item']);
Route::delete('/myKepls/delete/item/{id}', [CardController::class, 'delete_item']);
Route::post('/myKepls/update_asinc/{id}', [CardController::class, 'update_asinc']);

//profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/{id}/show', [ProfileController::class, 'show_membership']);
Route::post('/profile/{id}/purchase', [ProfileController::class, 'purchase']);
Route::post('/profile/{id}/purchase_extra', [ProfileController::class, 'purchase_extra']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);
Route::post('/profile/update/{id}', [ProfileController::class, 'update']);
Route::get('/profile/{id}/user', [ProfileController::class, 'get_user']);
Route::get('/profile/renovate', [ProfileController::class, 'renovate']);



