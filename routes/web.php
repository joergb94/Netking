<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\GeneralController;
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


