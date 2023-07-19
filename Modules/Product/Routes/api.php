<?php

use Illuminate\Http\Request;
// use Modules\Product\Http\Controllers\Api\V1\ProductApiController;

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

// Route::middleware('auth:api')->get('/api/v1', function (Request $request) {
//     return $request->user();
// });



Route::prefix('/v1')->group(function () {
    Route::get('/product', 'Api\V1\ProductApiController@index');
    Route::get('/product/{id?}', 'Api\V1\ProductApiController@productimages');
});