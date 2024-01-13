<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Listing\ImageController;
use App\Http\Controllers\Admin\Listing\VideoController;
use App\Http\Controllers\Admin\Listing\ScheduleController;

Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('profile',[ProfileController::class,'index'])->name('profile.index');
Route::put('profile/update',[ProfileController::class,'update'])->name('profile.update');

Route::group(['as'=>'sections.'],function(){
    Route::get('hero',[HeroController::class,'edit'])->name('hero');
    Route::put('hero',[HeroController::class,'update']);

    Route::resource('categories',CategoryController::class)->except('show');
    Route::resource('locations',LocationController::class)->except('show');
    Route::resource('amenities',AmenityController::class)->except('show');
    Route::resource('packages',PackageController::class)->except('show');

    Route::resource('listings.images',ImageController::class)->only(['create','store','destroy'])->scoped();
    Route::resource('listings.videos',VideoController::class)->only(['create','store','destroy'])->scoped();
    Route::resource('listings.schedules', ScheduleController::class)->except('show')->scoped();
    Route::resource('listings',ListingController::class)->except('show');
});

