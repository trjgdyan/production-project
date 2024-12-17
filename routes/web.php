<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QcController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RejectController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\fetchDataController;
use App\Http\Controllers\ProductionController;



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('user', UserController::class);
    Route::resource('product', ProductController::class);
    Route::get('/qc/menu', [QcController::class, 'menu'])->name('qc.menu');
    Route::resource('productions', ProductionController::class);
    Route::resource('rejects', RejectController::class);
    Route::group(['prefix' => 'fetchData'], function () {
        Route::get('/production', [fetchDataController::class, 'dataTableProduction'])->name('fetchData.production');
        Route::post('/searchDataCF', [fetchDataController::class, 'searchDataCF'])->name('fetchData.searchDataCF');
        Route::post('/searchDataReject', [fetchDataController::class, 'searchDataReject'])->name('fetchData.searchDataReject');
        Route::post('/searchDataRejectMenu', [fetchDataController::class, 'searchDataRejectMenu'])->name('fetchData.searchDataRejectMenu');
        Route::post('/searchDataGraph', [fetchDataController::class, 'searchDataGraph'])->name('fetchData.searchDataGraph');
    });
});
