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

Route::prefix('')->group(function () {

});

// List brands
Route::get('brands', 'Api\BrandController@index');

// List single brand
Route::get('brand/{id}', 'Api\BrandController@show');

// Create new brand
Route::post('brand', 'Api\BrandController@store');

// Update brand
Route::put('brand', 'Api\BrandController@update');

// Delete brand
Route::delete('brand/{id}', 'Api\BrandController@destroy');