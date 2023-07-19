<?php

use Illuminate\Http\Request;
use Modules\Customer\Http\Controllers\Api\V1\Auth\CustomerAuthController;

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

// Route::middleware('auth:api')->get('/register', [CustomerAuthController::class, 'register']);

Route::prefix('v1')->group(function () {

        Route::post('/register', [CustomerAuthController::class, 'register']);
        Route::post('/login', [CustomerAuthController::class, 'login']);

});


Route::middleware(['auth:sanctum'])->prefix('v1')->group(function(){

    Route::post('/logout', [CustomerAuthController::class, 'logout']);
    
});