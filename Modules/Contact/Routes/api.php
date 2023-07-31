<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/contact', function (Request $request) {
//     return $request->user();
// });

// Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
// });

Route::prefix('/v1')->group(function () {
    Route::post('/contact', 'Api\V1\ContactApiController@store');
});