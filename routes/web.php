<?php

use Illuminate\Http\Request;
use App\Services\Payment\Paypal;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SaveOrderController;
use App\Http\Controllers\Frontend\Pages\PaymentController;
use App\Http\Controllers\Frontend\PaymentProcessController;
use App\Http\Controllers\Frontend\CurrencyConverterController;
use App\Http\Controllers\Frontend\Pages\ListingModalController;
use App\Http\Controllers\Frontend\Pages\ListingsPageController;
use App\Http\Controllers\Frontend\Pages\ListingDetailController;
use App\Http\Controllers\Frontend\Pages\SubscriptionSucceedController;
use App\Http\Controllers\Frontend\Pages\SubscriptionCanceledController;
use App\Http\Controllers\Frontend\Review\SaveReviewController;

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




Route::group(['middleware'=>'auth:web'],function(){
    Route::post('order/{package}/{method}',PaymentProcessController::class)->name('packages.order');
    Route::post('listings/{listing}/reviews',SaveReviewController::class)->name('listings.reviews');
    Route::get('payment/return/{package}/{method?}',SaveOrderController::class)->name('payment.return');
    Route::post('currencies/change',CurrencyConverterController::class)->name('currencies.change');  
    Route::get('payment/cancel',function(){  dd(request(),'payment.cancel'); })->name('payment.cancel');  
});

Route::group(['as'=>'pages.'],function(){
    Route::get('listings/modal/{listing}',ListingModalController::class)->name('listings.modal');
    Route::get('listings/{category}',ListingsPageController::class)->name('listings');
    Route::get('listing-detail/{listing}',ListingDetailController::class)->name('listing-detail');
    Route::get('payment/{package}',PaymentController::class)->name('payment');
    
    Route::get('subscriptions-succeed',SubscriptionSucceedController::class)->name('subscriptions.succeed');
    Route::get('subscriptions-canceled',SubscriptionCanceledController::class)->name('subscriptions.canceled');
});


// Route::get('pay',function(Paypal $paypal){
    
//     $response=$paypal->pay('1222','USD');
//     return redirect()->away($response['payer-action']);
// });

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
