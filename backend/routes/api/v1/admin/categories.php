<?php

use App\Http\Controllers\Api\V1\Admin\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('category')->group(function () {
    Route::get('index' , [CategoryController::class,'index']);
    Route::get('show/{category}' , [CategoryController::class,'show']);
    Route::post('update/{category}' , [CategoryController::class,'update']);
    Route::get('delete/{category}' , [CategoryController::class,'delete']);
    Route::post('store' , [CategoryController::class,'store']);
});


