<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\GeneralController;
use App\Http\Controllers\web\CardController;
use App\Http\Controllers\web\HomeController;

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

Auth::routes();
//home 
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home/deleteOrResotore',[HomeController::class, 'deleteOrResotore']);


//genera 
Route::get('/getUser', [GeneralController::class, 'get_user']);

//cards

Route::get('/myKepls', [CardController::class, 'index'])->name('myKepls');
Route::get('/myKepls/create', [CardController::class, 'create']);
Route::get('/myKepls/{id}/edit', [CardController::class, 'edit']);
Route::post('/myKepls/{id}', [CardController::class, 'update']);
Route::delete('/myKepls/{id}', [CardController::class, 'deleteOrResotore']);
Route::post('/myKepls/create/card', [CardController::class, 'store']);
Route::get('/myKepls/background/{id}', [CardController::class, 'getBG']);



