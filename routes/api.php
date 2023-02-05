<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function (){
    Route::apiResource('/user', 'App\Http\Controllers\api\UserController');
});