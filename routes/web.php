<?php

use Illuminate\Support\Facades\Route;

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

//Muti-Authentication for Get route
// Route::GET('/admin', [App\Http\Controllers\Multiauth\LoginController::class, 'index']);
Route::GET('/admin/home', [App\Http\Controllers\Multiauth\DashboardController::class, 'index'])->name('admin.home');
Route::GET('/admin/driver', [App\Http\Controllers\Multiauth\DriverController::class, 'index'])->name('admin.driver');
Route::GET('/admin/driver/create', [App\Http\Controllers\Multiauth\DriverController::class, 'create'])->name('admin.create-driver');   
Route::GET('/admin/vehicle', [App\Http\Controllers\Multiauth\VehicleController::class, 'index'])->name('admin.vehicle');  
Route::GET('/admin/vehicle/create', [App\Http\Controllers\Multiauth\VehicleController::class, 'create'])->name('admin.create-vehicle');
Route::GET('/admin/warehouse', [App\Http\Controllers\Multiauth\WarehouseController::class, 'index'])->name('admin.warehouse');     
Route::GET('/admin/shipping', [App\Http\Controllers\Multiauth\ShippingController::class, 'index'])->name('admin.shiping'); 
Route::GET('/admin/shipping/create', [App\Http\Controllers\Multiauth\ShippingController::class, 'create'])->name('admin.create-shiping'); 
Route::GET('/admin/user/create', [App\Http\Controllers\Multiauth\UserController::class, 'create'])->name('admin.create-user'); 
Route::GET('/admin/users', [App\Http\Controllers\Multiauth\UserController::class, 'index'])->name('admin.users'); 
Route::GET('/admin/shippers', [App\Http\Controllers\Multiauth\ShipperController::class, 'index'])->name('admin.shippers');
Route::GET('/admin/receivers', [App\Http\Controllers\Multiauth\ReceiverController::class, 'index'])->name('admin.receiver'); 
Route::GET('/admin/driver/{id}/edit', [App\Http\Controllers\Multiauth\DriverController::class, 'edit'])->name('admin.edit-driver'); 
Route::GET('/admin/vehicle/{id}/edit', [App\Http\Controllers\Multiauth\VehicleController::class, 'edit'])->name('admin.edit-vehicle'); 
Route::GET('/admin/shipping/{id}/edit', [App\Http\Controllers\Multiauth\ShippingController::class, 'edit'])->name('admin.edit-shipping'); 
Route::GET('/admin/user/{id}/edit', [App\Http\Controllers\Multiauth\UserController::class, 'edit'])->name('admin.edit-user'); 


//Muti-Authentication for POST route
Route::POST('/shipping', [App\Http\Controllers\Multiauth\ShippingController::class, 'store'])->name('shipping.store');
Route::POST('/driver', [App\Http\Controllers\Multiauth\DriverController::class, 'store'])->name('driver.store'); 
Route::POST('/vehicle', [App\Http\Controllers\Multiauth\VehicleController::class, 'store'])->name('vehicle.store'); 
Route::POST('/user', [App\Http\Controllers\Multiauth\UserController::class, 'store'])->name('user.store'); 


//Muti-Authentication for Delete route
Route::DELETE('/driver/{id}', [App\Http\Controllers\Multiauth\DriverController::class, 'destroy'])->name('driver.delete');
Route::DELETE('/vehicle/{id}', [App\Http\Controllers\Multiauth\VehicleController::class, 'destroy'])->name('vehicle.delete');
Route::DELETE('/shipping/{id}', [App\Http\Controllers\Multiauth\ShippingController::class, 'destroy'])->name('shipping.delete');
Route::DELETE('/user/{id}', [App\Http\Controllers\Multiauth\UserController::class, 'destroy'])->name('user.delete');


//Muti-Authentication for Put route
Route::PUT('/driver/{id}', [App\Http\Controllers\Multiauth\DriverController::class, 'update'])->name('driver.update');
Route::PUT('/vehicle/{id}', [App\Http\Controllers\Multiauth\VehicleController::class, 'update'])->name('vehicle.update');
Route::PUT('/shipping/{id}', [App\Http\Controllers\Multiauth\ShippingController::class, 'update'])->name('shipping.update');
Route::PUT('/user/{id}', [App\Http\Controllers\Multiauth\UserController::class, 'update'])->name('user.update');





//Authentication
Auth::routes();



Route::get('/', function () {
    return view('home');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
