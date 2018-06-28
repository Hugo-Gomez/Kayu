<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/history', 'ScanHistoryController@index')->name('history');
Route::get('/history/{id}', 'ScanHistoryController@showProduct');

Route::get('/formpref', 'FormPrefController@index')->name('preferences');
Route::post('/formpref', 'FormPrefController@formok')->name('preferences');

Route::get('/legalmentions', 'LegalController@legalmentions');
Route::get('/cgu', 'LegalController@cgu');
Route::get('downloadJSONFile', array('as'=> 'downloadJSONFile', 'uses' => 'DashboardController@downloadJSONFile'));
