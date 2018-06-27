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

Route::get('/user/{id}/preferences', 'API\UserAPIController@getPreferences');
Route::put('/user/{id}/preferences', 'API\UserAPIController@updatePreferences');

Route::get('/user/{id}/products/history', 'API\ProductController@getHistory');
Route::post('/user/{id}/products/add', 'API\ProductController@addProduct');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
