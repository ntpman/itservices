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
    Route::get('/basic/model/{model}/change_status', 'Basic\ModelController@changeStatus')->name('change_status');
    Route::put('/basic/model/{model}', 'Basic\ModelController@update')->name('update');

    Route::get('/basic/building', 'Basic\BuildingController@index')->name('index');
    Route::get('/basic/building/create', 'Basic\BuildingController@create')->name('create');
    Route::post('/basic/building', 'Basic\BuildingController@store')->name('store');
    Route::get('/basic/building/{building}', 'Basic\BuildingController@show')->name('show');
    Route::get('/basic/building/{building}/edit', 'Basic\BuildingController@edit')->name('edit');
    Route::get('/basic/building/{building}/change_status', 'Basic\BuildingController@changeStatus')->name('change_status');
    Route::put('/basic/building/{building}', 'Basic\BuildingController@update')->name('update');

    Route::get('/basic/type', 'Basic\TypeController@index')->name('index');
    Route::get('/basic/type/create', 'Basic\TypeController@create')->name('create');
    Route::post('/basic/type', 'Basic\TypeController@store')->name('store');
    Route::get('/basic/type/{type}', 'Basic\TypeController@show')->name('show');
    Route::get('/basic/type/{type}/edit', 'Basic\TypeController@edit')->name('edit');
    Route::get('/basic/type/{type}/change_status', 'Basic\TypeController@changeStatus')->name('change_status');
    Route::put('/basic/type/{type}', 'Basic\TypeController@update')->name('update');

    Route::get('/basic/sub_type', 'Basic\SubTypeController@index')->name('index');
    Route::get('/basic/sub_type/create', 'Basic\SubTypeController@create')->name('create');
    Route::post('/basic/sub_type', 'Basic\SubTypeController@store')->name('store');
    Route::get('/basic/sub_type/{sub_type}', 'Basic\SubTypeController@show')->name('show');
    Route::get('/basic/sub_type/{sub_type}/edit', 'Basic\SubTypeController@edit')->name('edit');
    Route::get('/basic/sub_type/{sub_type}/change_status', 'Basic\SubTypeController@changeStatus')->name('change_status');
    Route::put('/basic/sub_type/{sub_type}', 'Basic\SubTypeController@update')->name('update');

    Route::get('/basic/common_name', 'Basic\CommonNameController@index')->name('index');
    Route::get('/basic/common_name/create', 'Basic\CommonNameController@create')->name('create');
    Route::post('/basic/common_name', 'Basic\CommonNameController@store')->name('store');
    Route::get('/basic/common_name/{common_name}', 'Basic\CommonNameController@show')->name('show');
    Route::get('/basic/common_name/{common_name}/edit', 'Basic\CommonNameController@edit')->name('edit');
    Route::get('/basic/common_name/{common_name}/change_status', 'Basic\CommonNameController@changeStatus')->name('change_status');
    Route::put('/basic/common_name/{common_name}', 'Basic\CommonNameController@update')->name('update');

    Route::get('/basic/usage', 'Basic\UsageController@index')->name('index');
    Route::get('/basic/usage/create', 'Basic\UsageController@create')->name('create');
    Route::post('/basic/usage', 'Basic\UsageController@store')->name('store');
    Route::get('/basic/usage/{usage}', 'Basic\UsageController@show')->name('show');
    Route::get('/basic/usage/{usage}/edit', 'Basic\UsageController@edit')->name('edit');
    Route::get('/basic/usage/{usage}/change_status', 'Basic\UsageController@changeStatus')->name('change_status');
    Route::put('/basic/usage/{usage}', 'Basic\UsageController@update')->name('update');

});

/**
 * Route Assets
 */
Route::prefix('assets')->group(function () {
    // asset
    Route::name('asset.')->group(function () {
        Route::get('/asset', 'Asset\AssetController@index')->name('index');
        Route::get('/asset/create', 'Asset\AssetController@create')->name('create');
        Route::post('/asset', 'Asset\AssetController@store')->name('store');
        Route::get('/asset/{asset}', 'Asset\AssetController@show')->name('show');
        Route::get('/asset/{asset}/edit', 'Asset\AssetController@edit')->name('edit');
        Route::put('/asset/{asset}', 'Asset\AssetController@update')->name('update');
    });
    // picture
    Route::name('picture.')->group(function () {
        Route::get('/picture', 'Asset\AssetPictureController@index')->name('index');
        Route::get('/picture/create', 'Asset\AssetPictureController@create')->name('create');
        Route::post('/picture', 'Asset\AssetPictureController@store')->name('store');
        Route::get('/picture/{picture}', 'Asset\AssetPictureController@show')->name('show');
        Route::get('/picture/{picture}/edit', 'Asset\AssetPictureController@edit')->name('edit');
        Route::put('/picture/{picture}', 'Asset\AssetPictureController@update')->name('update');
    });
});
/**
 * Route Suppliers
 */
Route::name('supplier.')->group(function () {
    Route::get('/supplier', 'Supplier\SupplierController@index')->name('index');
    Route::get('/supplier/create', 'Supplier\SupplierController@create')->name('create');
    Route::post('/supplier', 'Supplier\SupplierController@store')->name('store');
    Route::get('/supplier/{supplier}', 'Supplier\SupplierController@show')->name('show');
    Route::get('/supplier/{supplier}/edit', 'Supplier\SupplierController@edit')->name('edit');
    Route::put('/supplier/{supplier}', 'Supplier\SupplierController@update')->name('update');
});


