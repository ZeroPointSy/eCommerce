<?php


use App\Http\Controllers\Api\V1\User\CategoryController;
use Illuminate\Support\Facades\Route;


Route::prefix('categories')->group(function () {

    Route::get('/index',[CategoryController::class,'index']);
    Route::get('{category}/show',[CategoryController::class,'show']);
    Route::post('/store',[CategoryController::class,'store']);
    Route::put('{category}/update',[CategoryController::class,'update']);
    Route::delete('{category}/delete',[CategoryController::class,'destroy']);
});

