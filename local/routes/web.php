<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PushController;
use App\Http\Controllers\PlanController;

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

// Landing page
Route::get('/', function () {
    return view('public_site.landing');
});

// Route::get('/', [AdminController::class, 'index']);
Route::get('admin', [AdminController::class, 'index'])->name('admin_login');
Route::post('admin', [AdminController::class, 'login']);

Route::group(['middleware' => 'auth'], function(){

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
Route::get('appuser', [AdminController::class, 'appuser']);
Route::get('appuserStatus', [AdminController::class, 'appuserStatus']);
Route::get('userEdit', [AdminController::class, 'userEdit']);
Route::post('userEdit', [AdminController::class, '_userEdit']);
Route::get('page', [AdminController::class, 'page']);
Route::post('page', [AdminController::class, '_page']);
Route::get('key', [AdminController::class, 'verifyKey']);
Route::get('keyVerify', [AdminController::class, 'verifyKey']);
Route::post('verifyKey', [AdminController::class, '_verifyKey']);


/*
|--------------------------------------------
|Manage User Roles
|--------------------------------------------
*/
Route::resource('role',RoleController::class);
Route::get('role/delete/{id}',[RoleController::class,'delete']);

/*
|--------------------------------------------
|Manage Staff Users
|--------------------------------------------
*/
Route::resource('user',UserController::class);
Route::get('user/delete/{id}',[UserController::class,'delete']);
Route::get('userStatus',[UserController::class,'userStatus']);

/*
|--------------------------------------------
|Manage Welcome Slider
|--------------------------------------------
*/
Route::resource('slider',SliderController::class);
Route::get('slider/delete/{id}',[SliderController::class,'delete']);

/*
|--------------------------------------------
|Manage Homepage Banners
|--------------------------------------------
*/
Route::resource('banner',BannerController::class);
Route::get('banner/delete/{id}',[BannerController::class,'delete']);
Route::get('bannerStatus',[BannerController::class,'bannerStatus']);

/*
|--------------------------------------------
|Manage Language
|--------------------------------------------
*/
Route::resource('language',LanguageController::class);
Route::get('language/delete/{id}',[LanguageController::class,'delete']);
Route::get('languageStatus',[LanguageController::class,'languageStatus']);

/*
|--------------------------------------------
|Manage Category
|--------------------------------------------
*/
Route::resource('category',CategoryController::class);
Route::get('category/delete/{id}',[CategoryController::class,'delete']);
Route::get('categoryStatus',[CategoryController::class,'categoryStatus']);

/*
|--------------------------------------------
|Manage Stores
|--------------------------------------------
*/
Route::resource('store',StoreController::class);
Route::get('store/delete/{id}',[StoreController::class,'delete']);
Route::get('storeStatus',[StoreController::class,'storeStatus']);
Route::post('storeCate',[StoreController::class,'storeCate']);
Route::get('loginAsStore',[StoreController::class,'loginAsStore']);
Route::get('trend',[StoreController::class,'trend']);
Route::get('com',[StoreController::class,'com']);
Route::get('paid',[StoreController::class,'paid']);
Route::post('paid',[StoreController::class,'_paid']);
Route::get('paidDelete',[StoreController::class,'paidDelete']);
Route::get('createQr',[StoreController::class,'createQr']);

/*
|--------------------------------------------
|Manage Discount Offers
|--------------------------------------------
*/
Route::resource('offer',OfferController::class);
Route::get('offer/delete/{id}',[OfferController::class,'delete']);
Route::get('offerStatus',[OfferController::class,'offerStatus']);

/*
|--------------------------------------------
|Manage Push Notification
|--------------------------------------------
*/
Route::get('push',[PushController::class,'index']);
Route::post('push',[PushController::class,'push']);
Route::get('report',[PushController::class,'report']);
Route::post('report',[PushController::class,'_report']);

/*
|--------------------------------------------
|Manage Subscription Plan
|--------------------------------------------
*/
Route::resource('plan',PlanController::class);
Route::get('plan/delete/{id}',[PlanController::class,'delete']);
Route::get('planStatus',[PlanController::class,'planStatus']);

});

include("store.php");
