<?php


use App\Http\Controllers\Api\V1\User\OrderController;
use Illuminate\Support\Facades\Route;


Route::prefix('orders')->group(function () {

    Route::get('/index',[OrderController::class,'index']);
    Route::get('{order}/show',[OrderController::class,'show']);
    Route::post('/store',[OrderController::class,'store']);
    Route::put('{order}/update',[OrderController::class,'update']);
    Route::delete('{order}/delete',[OrderController::class,'destroy']);
});

