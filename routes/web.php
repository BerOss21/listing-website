<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Pages\ListingModalController;
use App\Http\Controllers\Frontend\Pages\ListingsPageController;
use App\Http\Controllers\Frontend\Pages\ListingDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');

Route::group(['as'=>'pages.'],function(){
    Route::get('listings/modal/{listing}',ListingModalController::class)->name('listings.modal');
    Route::get('listings/{category}',ListingsPageController::class)->name('listings');
    Route::get('listing-detail/{listing}',ListingDetailController::class)->name('listing-detail');
});

// Route::group(['middleware'=>'auth','prefix'=>'dashboard'],function(){
//     Route::get('/',[MainController::class,'index'])->name('dashboard');
//     Route::get('profile',[ProfileController::class,'show'])->name('dashboard.profile');
//     Route::put('profile',[ProfileController::class,'update']);
// });


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
