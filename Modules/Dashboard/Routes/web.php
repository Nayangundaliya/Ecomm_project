<?php
use Modules\Dashboard\Http\Controllers\DashboardController;
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

Route::middleware('auth')->prefix("admin")->group(function() {
    Route::get('/dashboard', [DashboardController::class,'index']);
    Route::get('/export', [DashboardController::class, 'export']);
    Route::post('/dashboard', [DashboardController::class, 'lang']);

});