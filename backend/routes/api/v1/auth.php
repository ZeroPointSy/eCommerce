<?php


use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('logout',[AuthController::class,'logout']);
