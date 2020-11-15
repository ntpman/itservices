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
    return view('index');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/admin/users', 'UserController');
    /**
     * Route Basics
     */
    Route::prefix('basics')->group(function () {
        // brand
        Route::name('brand.')->group(function () {
            Route::get('/brand', 'Basics\BrandController@index')->name('index');
            Route::get('/brand/create', 'Basics\BrandController@create')->name('create');
            Route::post('/brand', 'Basics\BrandController@store')->name('store');
            Route::get('/brand/{brand}/edit', 'Basics\BrandController@edit')->name('edit');
            Route::put('/brand/{brand}', 'Basics\BrandController@update')->name('update');
        });
        // brandmodel
        Route::name('brandmodel.')->group(function () {
            Route::get('/brandmodel', 'Basics\BrandModelController@index')->name('index');
            Route::get('/brandmodel/create', 'Basics\BrandModelController@create')->name('create');
            Route::post('/brandmodel', 'Basics\BrandModelController@store')->name('store');
            Route::get('/brandmodel/{brandModel}/edit', 'Basics\BrandModelController@edit')->name('edit');
            Route::put('/brandmodel/{brandModel}', 'Basics\BrandModelController@update')->name('update');
        });
        // building
        Route::name('building.')->group(function () {
            Route::get('/building', 'Basics\BuildingController@index')->name('index');
            Route::get('/building/create', 'Basics\BuildingController@create')->name('create');
            Route::post('/building', 'Basics\BuildingController@store')->name('store');
            Route::get('/building/{building}/edit', 'Basics\BuildingController@edit')->name('edit');
            Route::put('/building/{building}', 'Basics\BuildingController@update')->name('update');
        });
        // common
        Route::name('common.')->group(function () {
            Route::get('/common', 'Basics\CommonController@index')->name('index');
            Route::get('/common/create', 'Basics\CommonController@create')->name('create');
            Route::post('/common', 'Basics\CommonController@store')->name('store');
            Route::get('/common/{common}', 'Basics\CommonController@show')->name('show');
            Route::get('/common/{common}/edit', 'Basics\CommonController@edit')->name('edit');
            Route::put('/common/{common}', 'Basics\CommonController@update')->name('update');
        });
        // type
        Route::name('type.')->group(function () {
            Route::get('/type', 'Basics\TypeController@index')->name('index');
            Route::get('/type/create', 'Basics\TypeController@create')->name('create');
            Route::post('/type', 'Basics\TypeController@store')->name('store');
            Route::get('/type/{type}/edit', 'Basics\TypeController@edit')->name('edit');
            Route::put('/type/{type}', 'Basics\TypeController@update')->name('update');
        });
        // subtype
        Route::name('subtype.')->group(function () {
            Route::get('/subtype', 'Basics\SubtypeController@index')->name('index');
            Route::get('/subtype/create', 'Basics\SubtypeController@create')->name('create');
            Route::post('/subtype', 'Basics\SubtypeController@store')->name('store');
            Route::get('/subtype/{subtype}/edit', 'Basics\SubtypeController@edit')->name('edit');
            Route::put('/subtype/{subtype}', 'Basics\SubtypeController@update')->name('update');
        });
        // usage
        Route::name('usage.')->group(function () {
            Route::get('/usage', 'Basics\UsageController@index')->name('index');
            Route::get('/usage/create', 'Basics\UsageController@create')->name('create');
            Route::post('/usage', 'Basics\UsageController@store')->name('store');
            Route::get('/usage/{usage}', 'Basics\UsageController@show')->name('show');
            Route::get('/usage/{usage}/edit', 'Basics\UsageController@edit')->name('edit');
            Route::put('/usage/{usage}', 'Basics\UsageController@update')->name('update');
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
            Route::get('/detail', 'Assets\AssetDetailController@index')->name('index');
            Route::get('/detail/create', 'Assets\AssetDetailController@create')->name('create');
            Route::post('/detail', 'Assets\AssetDetailController@store')->name('store');
            Route::get('/detail/{detail}', 'Assets\AssetDetailController@show')->name('show');
            Route::get('/detail/{detail}/edit', 'Assets\AssetDetailController@edit')->name('edit');
            Route::put('/detail/{detail}', 'Assets\AssetDetailController@update')->name('update');
        });
        
        // owner
        Route::name('owner.')->group(function () {
            Route::get('/owner', 'Assets\AssetOwnerController@index')->name('index');
            Route::get('/owner/create', 'Assets\AssetOwnerController@create')->name('create');
            Route::post('/owner', 'Assets\AssetOwnerController@store')->name('store');
            Route::get('/owner/{owner}', 'Assets\AssetOwnerController@show')->name('show');
            Route::get('/owner/{owner}/edit', 'Assets\AssetOwnerController@edit')->name('edit');
            Route::put('/owner/{owner}', 'Assets\AssetOwnerController@update')->name('update');
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
    });
    /**
     * Route Suppliers
     */
    Route::name('supplier.')->group(function () {
        Route::get('/supplier', 'SupplierController@index')->name('index');
        Route::get('/supplier/create', 'SupplierController@create')->name('create');
        Route::post('/supplier', 'SupplierController@store')->name('store');
        Route::get('/supplier/{supplier}', 'SupplierController@show')->name('show');
        Route::get('/supplier/{supplier}/edit', 'SupplierController@edit')->name('edit');
        Route::put('/supplier/{supplier}', 'SupplierController@update')->name('update');
    });
    
});

