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
    // brandmodel
    Route::name('brandmodel.')->group(function () {
        Route::get('/brandmodel', 'Basic\BrandModelController@index')->name('index');
        Route::get('/brandmodel/create', 'Basic\BrandModelController@create')->name('create');
        Route::post('/brandmodel', 'Basic\BrandModelController@store')->name('store');
        Route::get('/brandmodel/{brandModel}', 'Basic\BrandModelController@show')->name('show');
        Route::get('/brandmodel/{brandModel}/edit', 'Basic\BrandModelController@edit')->name('edit');
        Route::get('/brandmodel/{brandModel}/change_status', 'Basic\BrandModelController@changeStatus')->name('change_status');
        Route::put('/brandmodel/{brandModel}', 'Basic\BrandModelController@update')->name('update');
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
    // common
    Route::name('common.')->group(function () {
        Route::get('/common', 'Basic\CommonController@index')->name('index');
        Route::get('/common/create', 'Basic\CommonController@create')->name('create');
        Route::post('/common', 'Basic\CommonController@store')->name('store');
        Route::get('/common/{common}', 'Basic\CommonController@show')->name('show');
        Route::get('/common/{common}/edit', 'Basic\CommonController@edit')->name('edit');
        Route::put('/common/{common}', 'Basic\CommonController@update')->name('update');
    });
    // usage
    Route::name('usage.')->group(function () {
        Route::get('/usage', 'Basic\UsageController@index')->name('index');
        Route::get('/usage/create', 'Basic\UsageController@create')->name('create');
        Route::post('/usage', 'Basic\UsageController@store')->name('store');
        Route::get('/usage/{usage}', 'Basic\UsageController@show')->name('show');
        Route::get('/usage/{usage}/edit', 'Basic\UsageController@edit')->name('edit');
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
/**
 * Route locations
 */
Route::name('location.')->group(function () {
    Route::get('/location', 'LocationController@index')->name('index');
    Route::get('/location/create', 'LocationController@create')->name('create');
    Route::post('/location', 'LocationController@store')->name('store');
    Route::get('/location/{supplier}', 'LocationController@show')->name('show');
    Route::get('/location/{supplier}/edit', 'LocationController@edit')->name('edit');
    Route::put('/location/{supplier}', 'LocationController@update')->name('update');
});


