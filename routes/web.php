<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ACMController;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\backend\SettingsController;
use App\Http\Controllers\backend\UserController;

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
Route::prefix('authenticate')->name('backend.auth.')->group(function(){
    Route::get('/login',[BackendController::class,'login'])->name('login');
    Route::post('/login-submit',[BackendController::class,'loginSubmit'])->name('login.submit');
});
Route::name('backend.')->middleware('auth')->group(function(){
    Route::get('/logout',[BackendController::class,'logout'])->name('logout');
    Route::get('/',[BackendController::class,'index'])->name('index');
    Route::prefix('settings')->name('settings.')->group(function(){
        Route::get('/',[SettingsController::class,'index'])->name('index');
        Route::put('/update',[SettingsController::class,'update'])->name('update');
    });
    Route::resource('user',UserController::class);
    Route::resource('role-permission',ACMController::class);

});