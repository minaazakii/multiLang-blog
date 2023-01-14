<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\CategoryController;

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


//Dashboard
Route::group(['prefix'=>'dashboard','as'=>'dashboard.','middleware'=>['checkLogin']], function ()
{
    //Settings
    Route::GET('/settings',[SettingController::class, 'index'])->name('settings');
    Route::PUT('/settings/{setting}',[SettingController::class, 'update'])->name('settings.update');

    //User Route
    Route::GET('/users/all', [UserController::class, 'datatable'])->name('users.datatables');
    Route::DELETE('/user/delete',[UserController::class, 'delete'])->name('user.delete');
    Route::resource('/users', UserController::class);

    //Category Route
    Route::GET('/categories/all', [CategoryController::class, 'datatable'])->name('categories.datatables');
    Route::DELETE('/category/delete',[CategoryController::class, 'delete'])->name('category.delete');
    Route::resource('/categories', CategoryController::class);
});


//Auth Route[Login,Register,Logout]
Auth::routes();



