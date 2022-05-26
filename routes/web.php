<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OtcfxController;
use App\Http\Controllers\QdealController;
use App\Http\Controllers\BloombergController;
use App\Http\Controllers\FixIncomeController;
use App\Http\Controllers\PenDealerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DerivativesController;
use App\Http\Controllers\GlobalblotterController;



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
    return Redirect::to('login');
});

 Route::get('forgetpassword',[TestController::class, 'forgetpassword'])->name('forgetpassword');


Route::get('forget-password', [TestController::class, 'showForgetPasswordForm'])->name('forget.password.get');

Route::post('forget-password', [TestController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [TestController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [TestController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function() {
  // USER
    Route::get('users', 'UserController@index');
    Route::post('users/store', 'UserController@store')->name('users.store');
    Route::post('deleteUser/{id}',[UserController::class, 'deleteUser'])->name('deleteUser');
    Route::get('editUser/{id}',[UserController::class, 'editUser'])->name('editUser');
    Route::post('updateUser/{id}',[UserController::class, 'updateUser'])->name('updateUser');



     // ROLE
     Route::get('roles', 'RoleController@index');
     Route::post('roleStore', 'RoleController@store')->name('roleStore');
     Route::post('deleteRole/{id}',[RoleController::class, 'deleteRole'])->name('deleteRole');
     Route::post('roleUpdate/{id}',[RoleController::class, 'roleUpdate'])->name('roleUpdate');



     // Permissio
     Route::get('permissions', 'PermissionController@index');
     Route::post('permissionsStore', 'PermissionController@store')->name('permissionsStore');
     Route::post('deletePermissions/{id}',[PermissionController::class, 'deletePermissions'])->name('deletePermissions');
     Route::post('permissionsUpdate/{id}',[PermissionController::class, 'permissionsUpdate'])->name('permissionsUpdate');



    //FMDQ-PenCom
    
    Route::get('pendealer',[PenDealerController::class, 'index'])->name('pendealer');
    Route::get('pendealer_tran',[PenDealerController::class, 'pendealer_tran'])->name('pendealer_tran');
    Route::post('pendealer_tranresult',[PenDealerController::class, 'pendealer_tranresult'])->name('pendealertransearch');
    Route::get('pendealer_tran_search',[PenDealerController::class, 'pendealer_tran_search'])->name('pendealer_tran_search');
    Route::get('pendealer_pfaTran',[PenDealerController::class, 'pendealer_pfaTran'])->name('pendealer_pfaTran');
    Route::get('pendealer_pfaTran_tbil',[PenDealerController::class, 'pendealer_pfaTran_tbil'])->name('pendealer_pfaTran_tbil');
    Route::get('pendealer_pfaTran_frq',[PenDealerController::class, 'pendealer_pfaTran_frq'])->name('pendealer_pfaTran_frq');
    Route::get('pendealer_pfaTran_bond',[PenDealerController::class, 'pendealer_pfaTran_bond'])->name('pendealer_pfaTran_bond');

    Route::get('apichart',[PenDealerController::class, 'apichart']);

    
    
   


    //FMDQ Q-Deal
    Route::get('qdeal',[QdealController::class, 'index'])->name('qdeal');
    Route::get('qdeal_tran',[QdealController::class, 'qdeal_tran'])->name('qdeal_tran');



     //FIX INCOME
     Route::get('fixincome',[FixIncomeController::class, 'index'])->name('fixincome');
     Route::get('fix_tran',[FixIncomeController::class, 'fix_tran'])->name('fix_tran');




      //Derivatives_tran
        Route::get('derivatives',[DerivativesController::class, 'index'])->name('derivatives');
        Route::get('derivatives_tran',[DerivativesController::class, 'derivatives_tran'])->name('derivatives_tran');




     //Global Blotter
        Route::get('globalblotter',[GlobalblotterController::class, 'index'])->name('globalblotter');
        Route::get('globalblotter_tran',[GlobalblotterController::class, 'globalblotter_tran'])->name('globalblotter_tran');
    



         //Bloomberg
         Route::get('bloomberg',[BloombergController::class, 'index'])->name('bloomberg');
         Route::get('bloomberg_tran',[BloombergController::class, 'bloomberg_tran'])->name('bloomberg_tran');
     



          //FMDQ OTC FX Futures Trading & Reporting System
        Route::get('otcfx',[OtcfxController::class, 'index'])->name('otcfx');
        Route::get('otcfx_tran',[OtcfxController::class, 'otcfx_tran'])->name('otcfx_tran');



         //Q-ex
         Route::get('qex',[OtcfxController::class, 'index'])->name('otcfx');
         Route::get('otcfx_tran',[OtcfxController::class, 'otcfx_tran'])->name('otcfx_tran');
    
    

});
