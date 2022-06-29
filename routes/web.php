<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BranchController;
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
    // return view('admin.login.login');
    return view('admin.panel.master');
});

//dashboard
route::get('/admin/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');

//branch
Route::controller(BranchController::class)
    ->prefix('admin')
    ->group(function () {
        Route::get('/branch/add', 'create')->name('branch.add');
        Route::post('/branch/store','store')->name('branch.store');
        Route::get('/branch/list', 'list')->name('branch.list');
        Route::get('/branch/edit/{branch_id}', 'edit')->name('branch.edit');
        Route::put('/branch/update/{branch_id}', 'update')->name('branch.update');
        Route::get('/branch/delete/{branch_id}', 'delete')->name('branch.delete');
    });

    //user
Route::controller(UserController::class)
->prefix('admin')
->group(function () {
    Route::get('/user/add', 'create')->name('user.add');
    Route::post('/user/store','store')->name('user.store');
    Route::get('/user/list', 'list')->name('user.list');
    // Route::get('/branch/edit/{branch_id}', 'edit')->name('branch.edit');
    // Route::put('/branch/update/{branch_id}', 'update')->name('branch.update');
    // Route::get('/branch/delete/{branch_id}', 'delete')->name('branch.delete');
});
