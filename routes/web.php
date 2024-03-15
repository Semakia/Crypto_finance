<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\PaypalPayoutController;
use App\Http\Controllers\StripeController;
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

Route::get('/', function () {
    return view('pages/home');
});

Route::get('/contact', function () {
    return view('pages/contact');
});

Route::get('/à-propos', function () {
    return view('pages/about');
});

Route::get('/invest', function () {
    return view('pages/invest');
});

Route::get('/connexion', function () {
    return view('pages/connexion');
});

Route::get('/register', function () {
    return view('pages/register');
});

route::get('/',[HomeController::class, 'index']);

Route::post('stripe-payment', [StripeController::class, 'createSession'])->name('campaign.stripe-payment');
    Route::get('payment-success', [StripeController::class, 'paymentSuccess'])->name('payment-success');
    Route::get('failed-payment', [StripeController::class, 'handleFailedPayment'])->name('failed-payment');
    Route::post('campaings/payments', [LandingController::class,'donation'])->name('campaign.payment');
    //paypal routes
    Route::get('paypal-onboard', [PaypalController::class, 'onBoard'])->name('paypal.init');
    Route::get('paypal-payment-success', [PaypalController::class, 'success'])->name('paypal.success');
    Route::get('paypal-payment-failed', [PaypalController::class, 'failed'])->name('paypal.failed');

    Route::get('paypal-payout', [PaypalPayoutController::class, 'payout'])->name('paypal.payout');




