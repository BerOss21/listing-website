<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\NewPasswordController;
// use App\Http\Controllers\Auth\PasswordResetLinkController;
// use App\Http\Controllers\Auth\ConfirmablePasswordController;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;



// Route::middleware('guest')->group(function () {
//     Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

//     Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

//     Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
// });


Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('profile',[ProfileController::class,'index'])->name('profile.index');
Route::put('profile/update',[ProfileController::class,'update'])->name('profile.update');

Route::get('hero',[HeroController::class,'edit'])->name('sections.hero');
Route::put('hero',[HeroController::class,'update']);

