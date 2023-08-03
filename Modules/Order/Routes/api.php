<?php

use Illuminate\Http\Request;
use Modules\Order\Http\Controllers\Api\V1\OrderApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::post('/v1/order', [OrderApiController::class, 'store']);

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function(){
    Route::post('/order', [OrderApiController::class, 'store']);
});

Route::get('/v1/order', function () {
    return "sdfsfd";
});