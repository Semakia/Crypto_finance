<?php

use App\Http\Controllers\FlowerUpgradeController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\MemberController;
use App\Http\Controllers\UserCampaignController;
use App\Http\Controllers\UserCampaignFaqController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserCalendarController;
use App\Http\Controllers\UserMembersController;
use App\Http\Controllers\UserSecurityController;
use App\Http\Controllers\UserCampaignUpdatesController;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\UserTransactionController;
use App\Http\Controllers\UserWithdrawController;
use Illuminate\Support\Facades\Route;

Route::get('user/membership', [MembershipController::class,'index'])->name('user.membership.index')->middleware('auth');
Route::get('/membership/pay-crypto', [MembershipController::class,'pay'])->name('user.membership.pay')->middleware('auth');
Route::post('/membership/pay-stripe', [MembershipController::class,'createSession'])->name('user.membership.pay.stripe')->middleware('auth');
Route::get('/membership/pay-stripe-success', [MembershipController::class,'paymentSuccess'])->name('user.membership.pay.payment-success');

//Route::get('/project-wizard', [LandingController::class,'projectWizard'])->name('project.wizard')->middleware('auth');

Route::prefix('user')->name('user.')->middleware('auth', 'xss', 'valid.user', 'role:user', 'membership.check')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get(
        '/donation-withdraw-chart',
        [DashboardController::class, 'donationWithdrawChart']
    )->name('donation.withdraw.chart');

    //    Route::group(['middleware' => ['permission:manage_user_campaign']], function () {
    // Campaigns
    Route::resource('campaigns', UserCampaignController::class);
    Route::post('update-field/{id}', [UserCampaignController::class, 'updateField'])->name('update.field');
    Route::post(
        'campaign-file/{id}',
        [UserCampaignController::class, 'campaignFileStore']
    )->name('campaign.file.store');
    Route::get('get-campaign-file/{id}', [UserCampaignController::class, 'getCampaignFile'])->name('get.campaign.file');
    Route::post(
        'remove-campaign-file',
        [UserCampaignController::class, 'removeCampaignFile']
    )->name('remove.campaign.file');
    Route::resource('campaign-faqs', UserCampaignFaqController::class);
    Route::resource('campaign-updates', UserCampaignUpdatesController::class);
    Route::get('/transaction/{transaction?}', [UserTransactionController::class, 'show'])->name('transaction.show');

    Route::get('payout-settings', [UserSettingController::class, 'index'])->name('settings.index');
    Route::post('payout-setting/update', [UserSettingController::class, 'update'])->name('settings-update');
    // });

    Route::resource('withdraw', UserWithdrawController::class);
    Route::get('members', [MemberController::class,'index'])->name('members.index');
    Route::get('members/{id}/upgrade', [FlowerUpgradeController::class,'store'])->name('members.upgrade');
    Route::get('get-commission/{campaign_id}', [UserWithdrawController::class, 'getCommission'])->name('get-commission');
    Route::get('/home', [UserHomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
    Route::get('/members', [UserMembersController::class, 'index'])->name('members');
    Route::get('/calendar', [UserCalendarController::class, 'index'])->name('calendar');
    Route::get('/security', [UserSecurityController::class, 'index'])->name('security');
});
