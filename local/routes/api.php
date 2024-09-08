<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\StripeController;
use App\Http\Controllers\Api\OrderController;

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

Route::get('welcome', [ApiController::class, 'welcome']);
Route::get('homepage', [ApiController::class, 'homepage']);
Route::get('view', [ApiController::class, 'view']);
Route::get('getItem', [ApiController::class, 'getItem']);
Route::post('add_to_cart', [ApiController::class, 'add_to_cart']);
Route::get('getCart', [ApiController::class, 'getCart']);
Route::post('updateDays', [ApiController::class, 'updateDays']);
Route::post('signup', [ApiController::class, 'signup']);
Route::get('resendCode', [ApiController::class, 'resendCode']);
Route::post('verifyOtp', [ApiController::class, 'verifyOtp']);
Route::post('login', [ApiController::class, 'login']);
Route::post('forgot', [ApiController::class, 'forgot']);
Route::post('resetPassword', [ApiController::class, 'resetPassword']);
Route::get('checkoutData', [ApiController::class, 'checkoutData']);
Route::post('saveAddress', [ApiController::class, 'saveAddress']);
Route::get('getAddress', [ApiController::class, 'getAddress']);
Route::post('stripePayment', [StripeController::class, 'stripePayment']);
Route::post('getAmount', [ApiController::class, 'getAmount']);
Route::post('placeOrder', [OrderController::class, 'placeOrder']);
Route::get('getWallet', [OrderController::class, 'getWallet']);
Route::post('updateWallet', [ApiController::class, 'updateWallet']);
Route::get('subscription', [ApiController::class, 'subscription']);
Route::post('mark', [ApiController::class, 'mark']);
Route::get('undo', [ApiController::class, 'undo']);
Route::get('account', [ApiController::class, 'account']);
Route::get('deleteAccount', [ApiController::class, 'deleteAccount']);
Route::get('deleteAddress', [ApiController::class, 'deleteAddress']);
Route::post('updateData', [ApiController::class, 'updateData']);
Route::get('stop', [ApiController::class, 'stop']);
Route::get('renew', [ApiController::class, 'renew']);
Route::post('customCart', [ApiController::class, 'customCart']);
Route::post('review', [ApiController::class, 'review']);
Route::get('search', [ApiController::class, 'search']);
Route::get('language', [ApiController::class, 'language']);
Route::get('page', [ApiController::class, 'page']);
Route::post('contact', [ApiController::class, 'contact']);

include("delivery.php");
include("store_api.php");