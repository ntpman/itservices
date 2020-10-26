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

/**
 * Route Basics
 */
Route::prefix('basic')->group(function () {
    // brand
    Route::name('brand.')->group(function () {
        Route::get('/brand', 'Basic\BrandController@index')->name('index');
        Route::get('/brand/create', 'Basic\BrandController@create')->name('create');
        Route::post('/brand', 'Basic\BrandController@store')->name('store');
        Route::get('/brand/{brand}/edit', 'Basic\BrandController@edit')->name('edit');
        Route::put('/brand/{brand}', 'Basic\BrandController@update')->name('update');
    });
    // model
    Route::name('model.')->group(function () {
        Route::get('/model', 'Basic\ModelController@index')->name('index');
        Route::get('/model/create', 'Basic\ModelController@create')->name('create');
        Route::post('/model', 'Basic\ModelController@store')->name('store');
        Route::get('/model/{model}', 'Basic\ModelController@show')->name('show');
        Route::get('/model/{model}/edit', 'Basic\ModelController@edit')->name('edit');
        Route::get('/model/{model}/change_status', 'Basic\ModelController@changeStatus')->name('change_status');
        Route::put('/model/{model}', 'Basic\ModelController@update')->name('update');
    });
    // building
    Route::name('building.')->group(function () {
        Route::get('/building', 'Basic\BuildingController@index')->name('index');
        Route::get('/building/create', 'Basic\BuildingController@create')->name('create');
        Route::post('/building', 'Basic\BuildingController@store')->name('store');
        Route::get('/building/{building}', 'Basic\BuildingController@show')->name('show');
        Route::get('/building/{building}/edit', 'Basic\BuildingController@edit')->name('edit');
        Route::get('/building/{building}/change_status', 'Basic\BuildingController@changeStatus')->name('change_status');
        Route::put('/building/{building}', 'Basic\BuildingController@update')->name('update');
    });
    // type
    Route::name('type.')->group(function () {
        Route::get('/type', 'Basic\TypeController@index')->name('index');
        Route::get('/type/create', 'Basic\TypeController@create')->name('create');
        Route::post('/type', 'Basic\TypeController@store')->name('store');
        Route::get('/type/{type}', 'Basic\TypeController@show')->name('show');
        Route::get('/type/{type}/edit', 'Basic\TypeController@edit')->name('edit');
        Route::get('/type/{type}/change_status', 'Basic\TypeController@changeStatus')->name('change_status');
        Route::put('/type/{type}', 'Basic\TypeController@update')->name('update');
    });
    // subtype
    Route::name('subtype.')->group(function () {
        Route::get('/subtype', 'Basic\SubtypeController@index')->name('index');
        Route::get('/subtype/create', 'Basic\SubtypeController@create')->name('create');
        Route::post('/subtype', 'Basic\SubtypeController@store')->name('store');
        Route::get('/subtype/{subtype}', 'Basic\SubtypeController@show')->name('show');
        Route::get('/subtype/{subtype}/edit', 'Basic\SubtypeController@edit')->name('edit');
        Route::put('/subtype/{subtype}', 'Basic\SubtypeController@update')->name('update');
    });
    // common_name
    Route::name('common_name.')->group(function () {
        Route::get('/common_name', 'Basic\CommonNameController@index')->name('index');
        Route::get('/common_name/create', 'Basic\CommonNameController@create')->name('create');
        Route::post('/common_name', 'Basic\CommonNameController@store')->name('store');
        Route::get('/common_name/{common_name}', 'Basic\CommonNameController@show')->name('show');
        Route::get('/common_name/{common_name}/edit', 'Basic\CommonNameController@edit')->name('edit');
        Route::get('/common_name/{common_name}/change_status', 'Basic\CommonNameController@changeStatus')->name('change_status');
        Route::put('/common_name/{common_name}', 'Basic\CommonNameController@update')->name('update');
    });
    // usage
    Route::name('usage.')->group(function () {
        Route::get('/usage', 'Basic\UsageController@index')->name('index');
        Route::get('/usage/create', 'Basic\UsageController@create')->name('create');
        Route::post('/usage', 'Basic\UsageController@store')->name('store');
        Route::get('/usage/{usage}', 'Basic\UsageController@show')->name('show');
        Route::get('/usage/{usage}/edit', 'Basic\UsageController@edit')->name('edit');
        Route::get('/usage/{usage}/change_status', 'Basic\UsageController@changeStatus')->name('change_status');
        Route::put('/usage/{usage}', 'Basic\UsageController@update')->name('update');
    });
});

/**
 * Route Assets
 */
Route::prefix('assets')->group(function () {
    // asset
    Route::name('asset.')->group(function () {
        Route::get('/asset', 'Assets\AssetController@index')->name('index');
        Route::get('/asset/create', 'Assets\AssetController@create')->name('create');
        Route::post('/asset', 'Assets\AssetController@store')->name('store');
        Route::get('/asset/{asset}', 'Assets\AssetController@show')->name('show');
        Route::get('/asset/{asset}/edit', 'Assets\AssetController@edit')->name('edit');
        Route::put('/asset/{asset}', 'Assets\AssetController@update')->name('update');
    });
    // picture
    Route::name('picture.')->group(function () {
        Route::get('/picture', 'Assets\AssetPictureController@index')->name('index');
        Route::get('/picture/create', 'Assets\AssetPictureController@create')->name('create');
        Route::post('/picture', 'Assets\AssetPictureController@store')->name('store');
        Route::get('/picture/{picture}', 'Assets\AssetPictureController@show')->name('show');
        Route::get('/picture/{picture}/edit', 'Assets\AssetPictureController@edit')->name('edit');
        Route::put('/picture/{picture}', 'Assets\AssetPictureController@update')->name('update');
    });
    // detail
    Route::name('detail.')->group(function () {
        Route::get('detail', 'Assets\AssetDetailController@index')->name('index');
        Route::get('detail/create', 'Assets\AssetDetailController@create')->name('create');
        Route::post('detail', 'Assets\AssetDetailController@store')->name('store');
        Route::get('detail/{detail}', 'Assets\AssetDetailController@show')->name('show');
        Route::get('detail/{detail}/edit', 'Assets\AssetDetailController@edit')->name('edit');
        Route::put('detail/{detail}', 'Assets\AssetDetailController@update')->name('update');
    });
    // owner
    Route::name('owner.')->group(function () {
        Route::get('owner', 'Assets\AssetOwnerController@index')->name('index');
        Route::get('owner/create', 'Assets\AssetOwnerController@create')->name('create');
        Route::post('owner', 'Assets\AssetOwnerController@store')->name('store');
        Route::get('owner/{owner}', 'Assets\AssetOwnerController@show')->name('show');
        Route::get('owner/{owner}/edit', 'Assets\AssetOwnerController@edit')->name('edit');
        Route::put('owner/{owner}', 'Assets\AssetOwnerController@update')->name('update');
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


