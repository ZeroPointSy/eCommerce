<?php


use App\Http\Controllers\Api\V1\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {


    Route::post('login',[AuthController::class,'login']);
});
