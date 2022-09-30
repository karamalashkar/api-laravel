<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get("/sort/{word}",[TestController::class,'sortString']);

Route::get("/number/{num}",[TestController::class,'divideNumber']);

Route::get("/text/{text}",[TestController::class,'decimalToBinary']);

Route::get("/operation/{operation}",[TestController::class,'prefixNotation']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
