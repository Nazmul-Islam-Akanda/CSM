<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ShipmentController;
use App\Http\Controllers\Admin\DashboardController;

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
    // return view('welcome');
    return view('admin.login.login');
    // return view('admin.panel.master');
});

//login
Route::get('/login',[LoginController::class,'loginpage'])->name('login.page');
Route::post('/do/login',[LoginController::class,'doLogin'])->name('doLogin');



Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

//logout
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

//dashboard
route::get('/admin/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');

//branch
Route::controller(BranchController::class)
    ->group(function () {
        Route::get('/branch/add', 'create')->name('branch.add');
        Route::post('/branch/store','store')->name('branch.store');
        Route::get('/branch/list', 'list')->name('branch.list');
        Route::get('/branch/edit/{branch_id}', 'edit')->name('branch.edit');
        Route::put('/branch/update/{branch_id}', 'update')->name('branch.update');
        Route::get('/branch/delete/{branch_id}', 'delete')->name('branch.delete');
    });

    //branch
Route::controller(AreaController::class)
->group(function () {
    Route::get('/area/add', 'create')->name('area.add');
    Route::post('/area/store','store')->name('area.store');
    Route::get('/area/list', 'list')->name('area.list');
    Route::get('/area/edit/{area_id}', 'edit')->name('area.edit');
    Route::put('/area/update/{area_id}', 'update')->name('area.update');
    Route::get('/area/delete/{area_id}', 'delete')->name('area.delete');
});

    //user
Route::controller(UserController::class)
->group(function () {
    Route::get('/user/add', 'create')->name('user.add');
    Route::post('/user/store','store')->name('user.store');
    Route::get('/user/list', 'list')->name('user.list');
    Route::get('/user/edit/{user_id}', 'edit')->name('user.edit');
    Route::put('/user/update/{user_id}', 'update')->name('user.update');
    Route::get('/user/delete/{user_id}', 'delete')->name('user.delete');
});



 //shipments
 Route::controller(ShipmentController::class)
 ->group(function () {
     Route::get('/shipment/add', 'create')->name('shipment.add');
//get customers under branch
Route::get('/customer-list/{branch}','getCustomer');
//get customer phone & address under customer
Route::get('/customer-phone-address/{customer}','getCustomerInfo');


     Route::post('/shipment/store','store')->name('shipment.store');
     Route::get('/shipment/list', 'list')->name('shipment.list');
     Route::get('/shipment/edit/{shipment_id}', 'edit')->name('shipment.edit');
     Route::put('/shipment/update/{shipment_id}', 'update')->name('shipment.update');
     Route::get('/shipment/delete/{shipment_id}', 'delete')->name('shipment.delete');
//multiple row status update
    Route::post('/multi/shipment/multi-update','multiUpdate')->name('multi.shipment');
 });

  //customers
  Route::controller(CustomerController::class)
  ->group(function () {
      Route::get('/customer/add', 'create')->name('customer.add');
//get area under branch
Route::get('/area-list/{branch}','getArea');

      Route::post('/customer/store','store')->name('customer.store');
      Route::get('/customer/list', 'list')->name('customer.list');
      Route::get('/customer/edit/{customer_id}', 'edit')->name('customer.edit');
      Route::put('/customer/update/{customer_id}', 'update')->name('customer.update');
      Route::get('/customer/delete/{customer_id}', 'delete')->name('customer.delete');
  });



    //drivers
    Route::controller(DriverController::class)
    ->group(function () {
        Route::get('/driver/add', 'create')->name('driver.add');
        Route::post('/driver/store','store')->name('driver.store');
        Route::get('/driver/list', 'list')->name('driver.list');
        Route::get('/driver/edit/{driver_id}', 'edit')->name('driver.edit');
        Route::put('/driver/update/{driver_id}', 'update')->name('driver.update');
        Route::get('/driver/delete/{driver_id}', 'delete')->name('driver.delete');
    });

    //missions
    Route::controller(MissionController::class)
    ->group(function () {
        Route::get('/mission/add', 'create')->name('mission.add');
        //get drivers under branch
Route::get('/driver-list/{branch}','getDriver');
//get customer phone & address under customer
Route::get('/driver-phone-address/{driver}','getDriverInfo');
        // Route::post('/driver/store','store')->name('driver.store');
        // Route::get('/driver/list', 'list')->name('driver.list');
        // Route::get('/driver/edit/{driver_id}', 'edit')->name('driver.edit');
        // Route::put('/driver/update/{driver_id}', 'update')->name('driver.update');
        // Route::get('/driver/delete/{driver_id}', 'delete')->name('driver.delete');
    });


});
