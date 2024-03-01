<?php


use App\Http\Controllers\Api\V1\User\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('products')->group(function () {

    Route::get('/index',[ProductController::class,'index']);
    Route::get('{product}/show',[ProductController::class,'show']);
    Route::post('/store',[ProductController::class,'store']);
    Route::put('{product}/update',[ProductController::class,'update']);
    Route::delete('{product}/delete',[ProductController::class,'destroy']);
});

