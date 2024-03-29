<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\GeneralController;
use App\Http\Controllers\web\contacUsController;
use App\Http\Controllers\web\CardController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\WelcomeController;
use App\Http\Controllers\web\ProfileController;
use App\Http\Controllers\web\FriendsController;
use App\Http\Controllers\Auth\RegisterController; 
use App\Http\Controllers\web\FaceBookController;
use App\Http\Controllers\web\GroupsController;
use App\Http\Controllers\web\GraphicsController;
use App\Http\Controllers\web\UserController;



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

    // Facebook Login URL
    Route::prefix('facebook')->name('facebook.')->group( function(){        
        Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
        Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
    });

    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
    Route::get('/register/checkedData', [RegisterController::class, 'checkedData']);


    Route::get('/offline', function () {    
        return view('modules/laravelpwa/offline');
    });
    
Route::get('/contactUs/{id}',[contacUsController::class, 'send_mail']);
   //genera 
Route::get('/Keypls/qr/{id}', [CardController::class, 'detail_qr']);
Route::get('/Keypls/{id}', [CardController::class, 'detail']);
Route::post('/Keypls/{id}/viewDetail', [CardController::class, 'view_card_details_link']); 
Route::get('/qr/scanPWA', [CardController::class, 'scann_pwa']);

Auth::routes();

Route::group(['middleware'=>['auth']], function(){
    
        Route::post('/Keypls/{id}/follow', [CardController::class, 'friendship']); 
        Route::get('/getStart', [GeneralController::class, 'get_start']);
        Route::post('/updateStart', [ProfileController::class, 'update_start'])->name('updateStart');
        Route::post('/updateStartno', [ProfileController::class, 'update_start_no']);
       
        //home 
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::post('/home/deleteOrResotore',[HomeController::class, 'deleteOrResotore']);
        Route::get('/home/social',[HomeController::class, 'socials_views']);
        Route::get('/home/keyplsData',[HomeController::class, 'keypls_data']);
        Route::post('/contactUs',[HomeController::class, 'deleteOrResotore']);
        Route::get('/home/{id}/show_qr', [CardController::class, 'show_qr']);
        Route::get('/Kepls/background/{id}', [CardController::class, '']);
        
        //User
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/create', [UserController::class, 'create']);
        Route::post('/users/create', [UserController::class, 'store']);
        Route::get('/users/{id}', [UserController::class, 'detail']);
        Route::get('/users/{id}/edit', [UserController::class, 'edit']);
        Route::put('/users/{id}', [UserController::class, 'update']);
        Route::get('/users/{id}/editpass', [UserController::class, 'editPassword']);
        Route::put('/users/{id}/pass', [UserController::class, 'updatePassword']);
        Route::delete('/users/{id}',[UserController::class, 'deleteOrResotore']);

        //My First Keypl
        Route::get('/MyFirstKeypl', [CardController::class, 'create_first'])->name('first');
        Route::get('/MyFirstKeypl/create', [CardController::class, 'create']);
        Route::post('/MyFirstKeypl/create', [CardController::class, 'store']);
        Route::get('/MyFirstKeypl/{id}/edit', [CardController::class, 'edit_first']);
        Route::get('/MyFirstKeypl/{id}/editDetail', [CardController::class, 'edit_detail']);
        Route::post('/MyFirstKeypl/{id}', [CardController::class, 'update']);
        Route::get('/MyFirstKeypl/getCreate', [CardController::class, 'get_create_card']);
        Route::post('/MyFirstKeypl/create/card', [CardController::class, 'store']);
        Route::get('/MyFirstKeypl/background/{id}', [CardController::class, 'getBG']);
        Route::post('/MyFirstKeypl/updateItem/{id}', [CardController::class, 'update_card_item']);
        Route::post('/MyFirstKeypl/updateItemfile/{id}', [CardController::class, 'update_card_item_file']);
        Route::post('/MyFirstKeypl/create/item', [CardController::class, 'create_item']);
        Route::delete('/MyFirstKeypl/delete/item/{id}', [CardController::class, 'delete_item']);
        Route::post('/MyFirstKeypl/update_asinc/{id}', [CardController::class, 'update_asinc']);
        Route::post('/MyFirstKeypl/update_asinc_network/{id}', [CardController::class, 'update_asinc_network']);
        Route::post('/MyFirstKeypl/update_asinc_theme/{id}', [CardController::class, 'update_theme']);

        //cards
        Route::get('/myKepls', [CardController::class, 'index'])->name('myKepls');
        Route::get('/myKepls/create', [CardController::class, 'create']);
        Route::post('/myKepls/create', [CardController::class, 'store']);
        Route::get('/myKepls/{id}/edit', [CardController::class, 'edit']);
        Route::get('/myKepls/{id}/editDetail', [CardController::class, 'edit_detail']);
        Route::get('/myKepls/{id}/show_qr', [CardController::class, 'show_qr']);
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
        Route::post('/myKepls/update_asinc_network/{id}', [CardController::class, 'update_asinc_network']);
        Route::post('/myKepls/update_asinc_theme/{id}', [CardController::class, 'update_theme']);
        Route::put('/myKepls/dragAndDrop', [CardController::class, 'drag_and_drop_order']);
        Route::get('/myKepls/show_add_type_item', [CardController::class, 'show_add_type_item']);
        Route::post('/update_type_items', [CardController::class, 'update_type_item']);

        
        //metrics 
        Route::get('/metrics', [GraphicsController::class, 'get_data_chart']);
        Route::get('/metrics/get_graphics', [GraphicsController::class, 'get_data_chart_json']);
        

        //profile
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/{id}/show', [ProfileController::class, 'show_membership']);
        Route::post('/profile/{id}/purchase', [ProfileController::class, 'purchase']);
        Route::post('/profile/{id}/purchase_extra', [ProfileController::class, 'purchase_extra']);
        Route::get('/profile/edit', [ProfileController::class, 'edit']);
        Route::post('/profile/update/{id}', [ProfileController::class, 'update']);
        Route::get('/profile/{id}/user', [ProfileController::class, 'get_user']);
        Route::get('/profile/renovate/{id}', [ProfileController::class, 'renovate']);

        // generatQR
        Route::get('/GeneratQR', [CardController::class, 'qrGenerator']);

        //friends
        Route::get('/friends', [FriendsController::class, 'index']);
        Route::get('/friends/createGroup', [GroupsController::class, 'create']);
        Route::post('/friends/createGroup', [GroupsController::class, 'store']);
        Route::get('/friends/{id}/editGroup', [GroupsController::class, 'edit']);
        Route::post('/friends/{id}/editGroup', [GroupsController::class, 'update']);
        Route::delete('/friends/deleteOfGroup/{id}', [GroupsController::class, 'delete']);
        Route::get('/friends/{id}/addGroup', [GroupsController::class, 'add_to_group']);
        Route::post('/friends/{id}/addGroup', [GroupsController::class, 'store_to_group']);
      

});


