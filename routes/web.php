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

//Muti-Authentication
Route::GET('/admin/home', [App\Http\Controllers\Multiauth\DashboardController::class, 'index'])->name('admin.home');
Route::GET('/admin/driver', [App\Http\Controllers\Multiauth\DriverController::class, 'index'])->name('admin.driver');   
Route::GET('/admin/vehicle', [App\Http\Controllers\Multiauth\VehicleController::class, 'index'])->name('admin.vehicle');   
Route::GET('/admin/shipping', [App\Http\Controllers\Multiauth\ShippingController::class, 'index'])->name('admin.shiping'); 
Route::GET('/admin/users', [App\Http\Controllers\Multiauth\UserController::class, 'index'])->name('admin.users');  




//Authentication
Auth::routes();



Route::get('/', function () {
    return view('home');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
