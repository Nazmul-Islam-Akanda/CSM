<?php

use App\Models\Branch;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ShipmentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WebsiteSetupController;
use App\Http\Controllers\Admin\Transaction\IncomeController;
use App\Http\Controllers\Admin\Transaction\ExpenseController;

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

    $shipment=null;

    return view('website.master',compact('shipment'));
})-> name('website.home');

//login
Route::get('/admin',[LoginController::class,'loginpage'])->name('login.page');
Route::post('/do/login',[LoginController::class,'doLogin'])->name('doLogin');

//track shipping
Route::get('/shipping/track',[TrackController::class,'shippingTrack'])->name('shipping.track');




Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

//logout
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

//dashboard
route::get('/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');

//clinic setup
route::get('/website/setup/info',[WebsiteSetupController::class,'setupInfo'])->name('website.setup.info');
route::get('/website/setup/edit/{id}',[WebsiteSetupController::class,'setupEdit'])->name('website.setup.edit');
route::put('/website/setup/update/{id}',[WebsiteSetupController::class,'setupUpdate'])->name('website.setup.update');

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
     Route::get('/shipment/details/{shipment_id}', 'details')->name('shipment.details');
     Route::get('/shipment/edit/{shipment_id}', 'edit')->name('shipment.edit');
     Route::put('/shipment/update/{shipment_id}', 'update')->name('shipment.update');
     Route::get('/shipment/delete/{shipment_id}', 'delete')->name('shipment.delete');
//multiple row status update
    Route::post('/multi/shipment/multi-update','multiUpdate')->name('multi.shipment');

    //return shipment list
    Route::get('/return/shipment/list', 'returnList')->name('shipment.list.return');
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
        Route::post('/mission/store','store')->name('mission.store');
        Route::get('/mission/list', 'list')->name('mission.list');
        Route::get('/mission/close/{mission_id}', 'close')->name('mission.close');
        Route::get('/mission/delete/{mission_id}', 'delete')->name('mission.delete');
    });


// Transactions
      //Income
      Route::controller(IncomeController::class)
      ->group(function () {

        //add select via customer
Route::get('/transaction/income/selected/via/customer/add', function () {
    $branches=Branch::all();
    return view('admin.panel.pages.income_via.income_from_customer_add',compact('branches'));
})->name('transaction.income.add.from.customer');

       //add select via branch
       Route::get('/transaction/income/selected/via/branch/add', function () {
        $branches=Branch::all();
        return view('admin.panel.pages.income_via.income_from_branch_add',compact('branches'));
    })->name('transaction.income.add.from.branch');

          Route::get('/transaction/income/list', 'list')->name('transaction.income.list');
             Route::get('/transaction/income/add', 'create')->name('transaction.income.add');
//get shipment under branch
Route::get('/shipment-list/{from_branch}','getShipment');
          Route::post('/transaction/income/store','store')->name('transaction.income.store');
          Route::get('/transaction/income/edit/{income_id}', 'edit')->name('transaction.income.edit');
          Route::put('/transaction/income/update/{income_id}', 'update')->name('transaction.income.update');
          Route::get('/transaction/income/delete/{income_id}', 'delete')->name('transaction.income.delete');
      });
      //Expense
      Route::controller(ExpenseController::class)
      ->group(function () {
          Route::get('/transaction/excense/list', 'list')->name('transaction.expense.list');
             Route::get('/transaction/excense/add', 'create')->name('transaction.expense.add');
          Route::post('/transaction/excense/store','store')->name('transaction.expense.store');
          Route::get('/transaction/excense/edit/{expense_id}', 'edit')->name('transaction.expense.edit');
          Route::put('/transaction/excense/update/{expense_id}', 'update')->name('transaction.expense.update');
          Route::get('/transaction/excense/delete/{expense_id}', 'delete')->name('transaction.expense.delete');
      });





  //Profile
  Route::controller(ProfileController::class)
  ->group(function () {
      Route::get('/profile/edit/{profile_id}', 'profile')->name('profile.edit');
         Route::put('/profile/update/{profile_id}', 'profileUpdate')->name('profile.update');
     });




});
