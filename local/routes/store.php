<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Store\AdminController;
use App\Http\Controllers\Store\TifinController;
use App\Http\Controllers\Store\OrderController;
use App\Http\Controllers\Store\DeliveryController;
use App\Http\Controllers\Store\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['prefix' => env('store')], function(){


Route::get('/', [AdminController::class, 'index']);
Route::get('login', [AdminController::class, 'index'])->name('store_login');
Route::post('login', [AdminController::class, 'login']);

Route::group(['middleware' => 'store'], function(){

/*
|-----------------------------------------
|Dashboard and Account Setting & Logout
|-----------------------------------------
*/
Route::get('home', [AdminController::class, 'home']);
Route::get('setting', [AdminController::class, 'setting']);
Route::post('setting', [AdminController::class, 'update']);
Route::get('logout', [AdminController::class, 'logout']);
Route::get('setLang', [AdminController::class, 'setLang']);
Route::get('paid', [AdminController::class, 'paid']);


/*
|--------------------------------------------
|Manage Tifin Box
|--------------------------------------------
*/
Route::resource('tifin',TifinController::class);
Route::get('tifin/delete/{id}',[TifinController::class,'delete']);
Route::get('tifinStatus',[TifinController::class,'tifinStatus']);

/*
|--------------------------------------------
|Manage Subscription & Delivery
|--------------------------------------------
*/
Route::get('order',[OrderController::class,'index']);
Route::get('orderView',[OrderController::class,'orderView']);
Route::get('today',[OrderController::class,'today']);
Route::get('next',[OrderController::class,'next']);
Route::post('assign',[OrderController::class,'assign']);
Route::get('print',[OrderController::class,'_print']);
Route::get('itemChart',[OrderController::class,'itemChart']);

/*
|--------------------------------------
|Create Orders
|-------------------------------------
*/
Route::get('createOrder',[OrderController::class,'createOrder']);
Route::post('createOrder',[OrderController::class,'_createOrder']);

/*
|--------------------------------------------
|Manage Delivery Staff
|--------------------------------------------
*/
Route::resource('delivery',DeliveryController::class);
Route::get('delivery/delete/{id}',[DeliveryController::class,'delete']);
Route::get('deliveryStatus',[DeliveryController::class,'deliveryStatus']);
Route::get('onlineStatus',[DeliveryController::class,'onlineStatus']);
Route::get('withdraw',[DeliveryController::class,'withdraw']);
Route::get('withdrawStatus',[DeliveryController::class,'withdrawStatus']);

/*
|--------------------------------------------
|Manage App Users
|--------------------------------------------
*/
Route::get('user',[UserController::class,'index']);
Route::get('userEdit',[UserController::class,'edit']);
Route::post('userEdit',[UserController::class,'_edit']);

});

});
