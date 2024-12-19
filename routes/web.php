<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QcController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RejectController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\fetchDataController;
use App\Http\Controllers\ProductionController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');


    Route::resource('user', UserController::class)->middleware('can:sdm');
    Route::resource('product', ProductController::class)->middleware('can:sdm');
    Route::get('/qc/menu', [QcController::class, 'menu'])->name('qc.menu')->middleware('can:produksiReject');
    Route::resource('productions', ProductionController::class)->middleware('can:produksiReject');
    Route::resource('rejects', RejectController::class)->middleware('can:produksiReject');
    Route::group(['prefix' => 'fetchData'], function () {
        Route::get('/production', [fetchDataController::class, 'dataTableProduction'])->name('fetchData.production')->middleware('can:produksiReject');
        Route::post('/searchDataCF', [fetchDataController::class, 'searchDataCF'])->name('fetchData.searchDataCF')->middleware('can:produksiReject');
        Route::post('/searchDataReject', [fetchDataController::class, 'searchDataReject'])->name('fetchData.searchDataReject')->middleware('can:produksiReject');
        Route::post('/searchDataRejectMenu', [fetchDataController::class, 'searchDataRejectMenu'])->name('fetchData.searchDataRejectMenu')->middleware('can:produksiReject');
        Route::post('/searchDataGraph', [fetchDataController::class, 'searchDataGraph'])->name('fetchData.searchDataGraph')->middleware('can:produksiReject');
        Route::post('/exportDataReject', [fetchDataController::class, 'exportDataReject'])->name('fetchData.exportDataReject')->middleware('can:produksiReject');
    });
});
