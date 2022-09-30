<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get("/sort/{word}",[TestController::class,'sortString']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
