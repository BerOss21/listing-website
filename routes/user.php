<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Dashboard\MainController;
use App\Http\Controllers\Frontend\Dashboard\ListingController;
use App\Http\Controllers\Frontend\Dashboard\ProfileController;
use App\Http\Controllers\Frontend\Dashboard\Listings\ImageController;
use App\Http\Controllers\Frontend\Dashboard\Listings\VideoController;
use App\Http\Controllers\Frontend\Dashboard\Listings\ScheduleController;


Route::group(['prefix'=>'dashboard'],function(){
    Route::get('/',[MainController::class,'index'])->name('dashboard');
    Route::get('profile',[ProfileController::class,'show'])->name('dashboard.profile');
    Route::put('profile',[ProfileController::class,'update']);

    Route::group(['as'=>'dashboard.'],function(){
        Route::resource('listings.images',ImageController::class)->only(['create','store','destroy'])->scoped();
        Route::resource('listings.videos', VideoController::class)->only(['create','store','destroy'])->scoped();
        Route::resource('listings.schedules', ScheduleController::class)->except('show');
        Route::resource('listings', ListingController::class);
    });
});




