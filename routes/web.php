<?php

use Illuminate\Support\Facades\Route;

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

Route::get('corona', 'ContributorController@index');
Route::group(['prefix' => 'corona'], function() {
	Route::get('contributor', 'ContributorController@index');
	Route::post('contributor', 'ContributorController@store')->name('contributor.submit');
	Route::get('get-region/{id}', 'ContributorController@getRegion')->name('regions.list');
	Route::get('get-city/{id}', 'ContributorController@getCity')->name('cities.list');
	Route::get('get-contributions/{countryId}/{regionId}/{cityId}/{citycode}', 'ContributorController@getContributions')->name('contributions.list');
	Route::get('corona', 'NeederController@index');
});