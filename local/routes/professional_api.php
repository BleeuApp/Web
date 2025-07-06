<?php

use App\Http\Controllers\Api\Professional\ApiController;

Route::group(['prefix' => 'professional'], function () {

    Route::post('login', [ApiController::class, 'login']);
});
