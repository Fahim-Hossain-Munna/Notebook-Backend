<?php

use App\Http\Controllers\Api\ApiCustomerLoginController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/customer/login',[ApiCustomerLoginController::class,'login']);
Route::post('/customer/register',[ApiCustomerLoginController::class,'register']);

Route::get('/category',[CategoryController::class,'index']);
