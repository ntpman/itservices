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
    return view('starter');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/admin/users', 'UserController');

Route::name('basic.')->group(function () {
    Route::get('/basic/brand', 'Basic\BrandController@index')->name('index');
    Route::get('/basic/brand/create', 'Basic\BrandController@create')->name('create');
    Route::post('/basic/brand', 'Basic\BrandController@store')->name('store');
    Route::get('/basic/brand/{brand}/edit', 'Basic\BrandController@edit')->name('edit');
    Route::put('/basic/brand/{brand}', 'Basic\BrandController@update')->name('update');

    Route::get('/basic/model', 'Basic\ModelController@index')->name('index');
    Route::get('/basic/model/create', 'Basic\ModelController@create')->name('create');
    Route::post('/basic/model', 'Basic\ModelController@store')->name('store');
    Route::get('/basic/model/{model}', 'Basic\ModelController@show')->name('show');
    Route::get('/basic/model/{model}/edit', 'Basic\ModelController@edit')->name('edit');
    Route::put('/basic/model/{model}', 'Basic\ModelController@update')->name('update');
});

Route::name('asset.')->group(function () {
    Route::get('/asset', 'Asset\AssetController@index')->name('index');
    Route::get('/asset/create', 'Asset\AssetController@create')->name('create');
    Route::post('/asset', 'Asset\AssetController@store')->name('store');
    Route::get('/asset/{asset}', 'Asset\AssetController@show')->name('show');
    Route::get('/asset/{asset}/edit', 'Asset\AssetController@edit')->name('edit');
    Route::put('/asset/{asset}', 'Asset\AssetController@update')->name('update');
});

Route::name('supplier.')->group(function () {
    Route::get('/supplier', 'Supplier\SupplierController@index')->name('index');
    Route::get('/supplier/create', 'Supplier\SupplierController@create')->name('create');
    Route::post('/supplier', 'Supplier\SupplierController@store')->name('store');
    Route::get('/supplier/{supplier}', 'Supplier\SupplierController@show')->name('show');
    Route::get('/supplier/{supplier}/edit', 'Supplier\SupplierController@edit')->name('edit');
    Route::put('/supplier/{supplier}', 'Supplier\SupplierController@update')->name('update');
});


