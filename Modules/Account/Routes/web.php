<?php

use Illuminate\Support\Facades\Route;
use Modules\Account\Http\Controllers\ReportingController;
use Modules\Account\Http\Controllers\AccountTypeController;
use Modules\Account\Http\Controllers\TransactionController;
use Modules\Account\Http\Controllers\AccountSetupController;
use Modules\Account\Http\Controllers\TransactionTypeController;

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

Route::prefix('account')->name('account.')->group(function() {
    Route::get('/',[ReportingController::class,'index'])->name('index');
    Route::prefix('/type')->name('type.')->group(function(){
        Route::get('/',[AccountTypeController::class,'index'])->name('index');
        Route::get('/create',[AccountTypeController::class,'create'])->name('create');
        Route::post('/store',[AccountTypeController::class,'store'])->name('store');
        Route::get('/show/{id}',[AccountTypeController::class,'show'])->name('show');
        Route::get('/edit/{id}',[AccountTypeController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[AccountTypeController::class,'update'])->name('update');
        Route::get('/destroy/{id}',[AccountTypeController::class,'destroy'])->name('destroy');
    });
    Route::prefix('/setup')->name('setup.')->group(function(){
        Route::get('/',[AccountSetupController::class,'index'])->name('index');
        Route::get('/create',[AccountSetupController::class,'create'])->name('create');
        Route::post('/store',[AccountSetupController::class,'store'])->name('store');
        Route::get('/show/{id}',[AccountSetupController::class,'show'])->name('show');
        Route::get('/edit/{id}',[AccountSetupController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[AccountSetupController::class,'update'])->name('update');
        Route::get('/destroy/{id}',[AccountSetupController::class,'destroy'])->name('destroy');
    });
    Route::prefix('/transaction-type')->name('transactionType.')->group(function(){
        Route::get('/',[TransactionTypeController::class,'index'])->name('index');
        Route::get('/create',[TransactionTypeController::class,'create'])->name('create');
        Route::post('/store',[TransactionTypeController::class,'store'])->name('store');
        Route::get('/show/{id}',[TransactionTypeController::class,'show'])->name('show');
        Route::get('/edit/{id}',[TransactionTypeController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[TransactionTypeController::class,'update'])->name('update');
        Route::get('/destroy/{id}',[TransactionTypeController::class,'destroy'])->name('destroy');
    });
    Route::prefix('/transaction')->name('transaction.')->group(function(){
        Route::get('/',[TransactionController::class,'index'])->name('index');
        Route::get('/create',[TransactionController::class,'create'])->name('create');
        Route::post('/store',[TransactionController::class,'store'])->name('store');
        Route::get('/show/{id}',[TransactionController::class,'show'])->name('show');
        Route::get('/edit/{id}',[TransactionController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[TransactionController::class,'update'])->name('update');
        Route::get('/destroy/{id}',[TransactionController::class,'destroy'])->name('destroy');
    });
});