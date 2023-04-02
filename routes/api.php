<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\TransferController;

Route::group(['prefix' => 'v1'], function (){
    Route::apiResource('user', UserController::class);
    Route::apiResource('transfers', TransferController::class);
});