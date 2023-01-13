<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SettingController;

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

Route::group(['prefix'=>'dashboard','as'=>'dashboard.'], function ()
{
    Route::GET('/settings',[SettingController::class, 'index'])->name('settings');
    Route::PUT('/settings/{setting}',[SettingController::class, 'update'])->name('settings.update');
});
