<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

// Định nghĩa route nhóm 'Backend'
Route::prefix('backend')->group(function () {

    // Route cho logout
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
    Route::match(['get', 'post'], 'logouthome', [AuthController::class, 'logouthome'])->middleware('auth');

    // Nhóm route 'dashboard'
    Route::prefix('dashboard')->middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
    });
});

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');