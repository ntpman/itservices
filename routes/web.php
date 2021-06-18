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

// Route::get('/', function () {
//     return view('helpdesks.index');
// });

Route::get('/', 'Helpdesks\ViewController@index');

Route::get('/helpdesk', 'Helpdesks\ViewController@index')->name('index');
Route::get('/helpdesk/newRequest', 'Helpdesks\ViewController@newRequest')->name('newRequest');
Route::get('/helpdesk/listAll', 'Helpdesks\ViewController@listAll')->name('listAll');
Route::get('/helpdesk/create', 'Helpdesks\FormController@create')->name('create');
Route::post('/helpdesk/save', 'Helpdesks\FormController@store')->name('store');
Route::get('/helpdesk/edit/{id}', 'Helpdesks\FormController@edit')->name('edit');
Route::put('/helpdesk/update', 'Helpdesks\FormController@update')->name('update');

Route::get('/helpdesk/listByCriteria', 'Helpdesks\ViewController@listByCriteria')->name('listByCriteria');
Route::get('/helpdesk/listUnfinishRequest', 'Helpdesks\ViewController@listUnfinishRequest')->name('listUnfinishRequest');
Route::get('/helpdesk/listWorkCriteria', 'Helpdesks\WorkerController@listWorkByCriteria')->name('listWorkByCriteria');

Route::get('/helpdesk/unAssignSupervisor', 'Helpdesks\RequestAssignController@unAssignSupervisor')->name('unAssignSupervisor');
Route::get('/helpdesk/assignSupervisor/{id}', 'Helpdesks\RequestAssignController@assignSupervisor')->name('assignSupervisor');
Route::post('/helpdesk/saveSupervisor', 'Helpdesks\RequestAssignController@saveSupervisor')->name('saveSupervisor');
Route::get('/helpdesk/unAssignWorker', 'Helpdesks\RequestAssignController@unAssignWorker')->name('unAssignWorker');
Route::get('/helpdesk/assignWorker/{id}', 'Helpdesks\RequestAssignController@assignWorker')->name('assignWorker');
Route::post('/helpdesk/saveWorker', 'Helpdesks\RequestAssignController@saveWorker')->name('saveWorker');

Route::get('/helpdesk/workList', 'Helpdesks\WorkerController@workList')->name('workList');
Route::get('/helpdesk/assignedList', 'Helpdesks\WorkerController@assignedList')->name('assignedList');
Route::get('/helpdesk/workOwner', 'Helpdesks\WorkerController@workOwner')->name('workOwner');
Route::get('/helpdesk/workRecord/{id}', 'Helpdesks\WorkerController@workRecord')->name('workRecord');
Route::post('/helpdesk/workRecord', 'Helpdesks\WorkerController@store')->name('store');
Route::get('/helpdesk/evaluate', 'Helpdesks\WorkerController@evaluate')->name('evaluate');
Route::get('/helpdesk/evaluate/{id}', 'Helpdesks\WorkerController@evaluate')->name('evaluate');
Route::post('/helpdesk/saveSurvey', 'Helpdesks\WorkerController@saveSurvey')->name('saveSurvey');
Route::post('/helpdesk/prelimAssess', 'Helpdesks\WorkerController@prelimAssess')->name('prelimAssess');
Route::post('/helpdesk/saveWorkDetail', 'Helpdesks\WorkerController@saveWorkDetail')->name('saveWorkDetail');
Route::get('/helpdesk/satisfactionList', 'Helpdesks\WorkerController@satisfactionList')->name('satisfactionList');
Route::get('/helpdesk/satisfactionRecord/{id}', 'Helpdesks\WorkerController@satisfactionRecord')->name('satisfactionRecord');
Route::post('/helpdesk/saveSatisfaction', 'Helpdesks\WorkerController@saveSatisfaction')->name('saveSatisfaction');

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
            Route::get('/subtype', 'Basics\SubTypeController@index')->name('index');
            Route::get('/subtype/create', 'Basics\SubTypeController@create')->name('create');
            Route::post('/subtype', 'Basics\SubTypeController@store')->name('store');
            Route::get('/subtype/{subtype}/edit', 'Basics\SubTypeController@edit')->name('edit');
            Route::put('/subtype/{subtype}', 'Basics\SubTypeController@update')->name('update');
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
        // picture
        Route::name('picture.')->group(function () {
            Route::get('/picture', 'Assets\AssetPictureController@index')->name('index');
            Route::get('/picture/create', 'Assets\AssetPictureController@create')->name('create');
            Route::post('/picture', 'Assets\AssetPictureController@store')->name('store');
            Route::get('/picture/{picture}', 'Assets\AssetPictureController@show')->name('show');
            Route::get('/picture/{picture}/edit', 'Assets\AssetPictureController@edit')->name('edit');
            Route::put('/picture/{picture}', 'Assets\AssetPictureController@update')->name('update');
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
    Route::prefix('supplier')->group(function () {
        Route::name('supplier.')->group(function () {
            Route::get('', 'SupplierController@index')->name('index');
            Route::get('/create', 'SupplierController@create')->name('create');
            Route::post('', 'SupplierController@store')->name('store');
            Route::get('/{supplier}', 'SupplierController@show')->name('show');
            Route::get('/{supplier}/edit', 'SupplierController@edit')->name('edit');
            Route::put('/{supplier}', 'SupplierController@update')->name('update');
        });
    });
});

