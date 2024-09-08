<?php

use App\Http\Controllers\Api\Store\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'store'], function(){

Route::post('sendOtp', [ApiController::class, 'sendOtp']);
Route::post('signup', [ApiController::class, 'signup']);
Route::post('login', [ApiController::class, 'login']);
Route::get('homepage', [ApiController::class, 'homepage']);
Route::get('account', [ApiController::class, 'account']);
Route::post('updateAccount', [ApiController::class, 'updateAccount']);
Route::post('password', [ApiController::class, 'password']);
Route::post('days', [ApiController::class, 'days']);
Route::post('meal', [ApiController::class, 'meal']);
Route::get('staff', [ApiController::class, 'staff']);
Route::get('deleteStaff', [ApiController::class, 'deleteStaff']);
Route::post('addStaff', [ApiController::class, 'addStaff']);
Route::get('item', [ApiController::class, 'item']);
Route::get('deleteItem', [ApiController::class, 'deleteItem']);
Route::post('addItem', [ApiController::class, 'addItem']);
Route::post('uploadImage', [ApiController::class, 'uploadImage']);
Route::get('withdraw', [ApiController::class, 'withdraw']);
Route::get('approve', [ApiController::class, 'approve']);
Route::get('order', [ApiController::class, 'order']);
Route::get('delivery', [ApiController::class, 'delivery']);
Route::post('assign', [ApiController::class, 'assign']);
Route::get('earn', [ApiController::class, 'earn']);
Route::get('paid', [ApiController::class, 'paid']);
Route::get('language', [ApiController::class, 'language']);
Route::get('resendCode', [ApiController::class, 'resendCode']);
Route::post('forgot', [ApiController::class, 'forgot']);
Route::post('resetPassword', [ApiController::class, 'resetPassword']);

});