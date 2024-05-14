<?php

use App\Http\Controllers\Api\ApiAuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if(!Auth::check()){
        return view('auth.login');
    }else{
        return redirect()->route('dashboard');
    }
});

Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard')->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    // setting part
    Route::get('/setting', [SettingController::class,'index'])->name('setting');
    Route::post('/setting/update/fname', [SettingController::class,'update_fname'])->name('setting.update.firstname');
    Route::post('/setting/update/lname', [SettingController::class,'update_lname'])->name('setting.update.lastname');
    Route::post('/setting/update/email', [SettingController::class,'update_email'])->name('setting.update.email');
    Route::post('/setting/update/password', [SettingController::class,'update_password'])->name('setting.update.password');
    Route::post('/setting/update/picture', [SettingController::class,'update_picture'])->name('setting.update.picture');
    Route::post('/setting/update/biodata', [SettingController::class,'update_biodata'])->name('setting.update.biodata');
    Route::post('/setting/update/title', [SettingController::class,'update_title'])->name('setting.update.title');
    Route::post('/setting/update/address', [SettingController::class,'update_address'])->name('setting.update.address');
    Route::post('/setting/update/contact', [SettingController::class,'update_contact'])->name('setting.update.contact');

    // profile part
    Route::get('/profile', [ProfileController::class,'index'])->name('profile');

    // category part
    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::post('/category',[CategoryController::class,'create'])->name('category.create');
    // tag part
    Route::get('/tag',[TagController::class,'index'])->name('tag');
    Route::post('/tag',[TagController::class,'create'])->name('tag.create');

    // blog part
    Route::get('/blog',[BlogController::class,'index'])->name('blog');
    Route::post('/blog/create',[BlogController::class,'create'])->name('blog.create');

});

require __DIR__.'/auth.php';
