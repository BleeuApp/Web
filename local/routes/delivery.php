<?php

use App\Http\Controllers\Api\Delivery\ApiController;

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
Route::group(['prefix' => 'delivery'], function(){

Route::post('login', [ApiController::class, 'login']);
Route::get('home', [ApiController::class, 'home']);
Route::get('updateStatus', [ApiController::class, 'updateStatus']);
Route::get('account', [ApiController::class, 'account']);
Route::post('setting', [ApiController::class, 'accountSetting']);
Route::post('order', [ApiController::class, 'order']);
Route::get('earning', [ApiController::class, 'earning']);
Route::post('withdraw', [ApiController::class, 'withdraw']);
Route::get('history', [ApiController::class, 'history']);
Route::post('uploadImage', [ApiController::class, 'uploadImage']);
Route::get('language', [ApiController::class, 'language']);
Route::get('resendCode', [ApiController::class, 'resendCode']);
Route::post('forgot', [ApiController::class, 'forgot']);
Route::post('resetPassword', [ApiController::class, 'resetPassword']);
Route::get('myAccount', [ApiController::class, 'myAccount']);
});