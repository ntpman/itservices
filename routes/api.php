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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('provinces.')->group(function () {
    Route::get('provinces', 'Api\ProvinceController@province')->name('province');
    Route::get('districts/{id}', 'Api\ProvinceController@district')->name('district');
    Route::get('subdistricts/{id}', 'Api\ProvinceController@subdistrict')->name('subdistrict');
});