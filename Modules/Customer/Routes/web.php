<?php
use Modules\Customer\Http\Controllers\CustomerController;
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
     
    Route::get('/customer', [CustomerController::class,'index']);
  //  Route::get('/customer/create', [CustomerController::class,'create']);
   // Route::post('/customer/store', [CustomerController::class, 'store']);
    // Route::get('/customer/edit/{id}', [CustomerController::class, 'edit']);
    // Route::post('/customer/update/{id}', [CustomerController::class, 'update']);
    //  Route::get("/customer/status/{status}/{id}", [CustomerController::class, 'changstatus']);
    Route::get('/customer/destory/{id}', [CustomerController::class, 'destroy']);

});