<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;

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
Route::view('/test', 'dashboard.layouts.layout');


//Settings
Route::group(['prefix'=>'dashboard','as'=>'dashboard.','middleware'=>['checkLogin']], function ()
{
    Route::GET('/settings',[SettingController::class, 'index'])->name('settings');
    Route::PUT('/settings/{setting}',[SettingController::class, 'update'])->name('settings.update');


    //User Route
    Route::GET('/users/all', [UserController::class, 'datatable'])->name('users.datatables');
    Route::DELETE('/user/delete',[UserController::class, 'delete'])->name('user.delete');
    Route::resource('/users', UserController::class);
});


//Auth Route
Auth::routes();



