<?php
use Modules\Brand\Http\Controllers\BrandController;
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
     
    Route::get('/brand', [BrandController::class,'index']);
    Route::get('/brand/create', [BrandController::class,'create']);
    Route::post('/brand/store', [BrandController::class, 'store']);
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);
    Route::post('/brand/update/{id}', [BrandController::class, 'update']);
    Route::get('/brand/destory/{id}', [BrandController::class, 'destroy']);

});