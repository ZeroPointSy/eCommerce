<?php


use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('logout',[AuthController::class,'logout'])->middleware('auth:api');
Route::post('login',[AuthController::class,'login']);
