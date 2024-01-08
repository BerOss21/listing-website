<?php

use App\Http\Controllers\Frontend\Dashboard\ListingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Dashboard\ProfileController;
use App\Http\Controllers\Frontend\Dashboard\MainController;




Route::group(['prefix'=>'dashboard'],function(){
    Route::get('/',[MainController::class,'index'])->name('dashboard');
    Route::get('profile',[ProfileController::class,'show'])->name('dashboard.profile');
    Route::put('profile',[ProfileController::class,'update']);


    Route::resource('listings', ListingController::class);
});

Route::group(['prefix'=>'dashboard','as'=>'dashboard.'],function(){
    Route::resource('listings', ListingController::class);
});


