<?php

use App\Http\Controllers\Api\ApiAuthorController;
use App\Http\Controllers\Api\ApiBlogController;
use App\Http\Controllers\Api\ApiCustomerLoginController;
use App\Http\Controllers\Api\ApiTagController;
use App\Http\Controllers\Api\ApiUpdateController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// login resgister
Route::post('/customer/login',[ApiCustomerLoginController::class,'login']);
Route::post('/customer/register',[ApiCustomerLoginController::class,'register']);

// top author

Route::get('/author', [ApiAuthorController::class,'top_author'])->name('top.author');

// updated

Route::get('/latest/update', [ApiUpdateController::class,'update'])->name('update');

// get categories
Route::get('/category/latest',[CategoryController::class,'latest']);
Route::get('/category/blogs/{slug}',[CategoryController::class,'category_blog']);

// get tags
Route::get('/tag/latest',[ApiTagController::class,'latest']);
Route::get('/tag/blogs/{slug}',[ApiTagController::class,'tag_blog']);

// get blogs
Route::get('/blogs',[ApiBlogController::class,'show']);
Route::get('/blogs/feature',[ApiBlogController::class,'feature']);
Route::get('/blogs/popular',[ApiBlogController::class,'popular']);
Route::get('/blog/single/{id}',[ApiBlogController::class,'single']);

// searchableblog
Route::get('/search/blog',[ApiBlogController::class,'search']);

// blog update views
// Route::get('/search/blog',[ApiBlogController::class,'search']);


