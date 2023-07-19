<?php
use Modules\Order\Http\Controllers\OrderController;
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
     
    Route::get('/order', [OrderController::class,'index']);
  //  Route::get('/order/create', [OrderController::class,'create']);
   // Route::post('/order/store', [OrderController::class, 'store']);
    // Route::get('/order/edit/{id}', [OrderController::class, 'edit']);
    // Route::post('/order/update/{id}', [OrderController::class, 'update']);
    //  Route::get("/order/status/{status}/{id}", [OrderController::class, 'changstatus']);
    Route::get('/order/destory/{id}', [OrderController::class, 'destroy']);

});