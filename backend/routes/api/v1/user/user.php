<?php


use App\Http\Controllers\Api\V1\User\UserController;
use Illuminate\Support\Facades\Route;

require 'auth.php';
require 'order.php';


Route::put('update',[UserController::class,'update']);
Route::get('profile',[UserController::class,'initialData']);
