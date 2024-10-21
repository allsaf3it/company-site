<?php

use App\Http\Controllers\Usdt\Auth\RegisterController;
use App\Http\Controllers\Usdt\P2PController;
use App\Models\Usdt;
use App\Notifications\SomeNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Payments\BinanceApiDeposit;
use Illuminate\Http\Request;


// Dashboard
Route::get('/', 'HomeController@index')->name('home');

// Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Reset Password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Verify Email
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/verify/{id}', 'Auth\VerificationController@verifyCode')->name('verification.verifybycode');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::post('/completeOTP', [RegisterController::class, 'completeOTP'])->name('completeOTP');
Route::get('/complete-registration', [RegisterController::class, 'completeRegistration'])->name('complete.registration');

Route::middleware(['2fa', 'usdt.auth:usdt', 'usdt.verified'])->group(function () {

    Route::post('/2fa', function () {
        return redirect()->route('usdt.home');
    })->name('2fa');

    Route::prefix('p2p')->as('p2p.')->group(function (){
        Route::get('/', [P2PController::class, 'index'])->name('index');
        Route::get('/deposit', [P2PController::class, 'deposit'])->name('deposit');
        Route::post('/payment', [P2PController::class, 'create_payment'])->name('payment');
        Route::post('/confirm-payment', [P2PController::class, 'confirm_payment'])->name('confirm-payment');

        Route::get('/withdraw', [P2PController::class, 'withdraw'])->name('withdraw');
        Route::post('/withdraw_create', [P2PController::class, 'withdraw_create'])->name('withdraw_create');
        Route::post('/confirm_withdraw', [P2PController::class, 'confirm_withdraw'])->name('confirm_withdraw');

        Route::get('/transfer_to_STwallet', [P2PController::class, 'transfer_to_STwallet'])->name('transfer');
        Route::post('/transfer_save', [P2PController::class, 'transfer_save'])->name('transfer_save');
    });

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/read-messages', 'HomeController@read_message')->name('read-messages');

    Route::prefix('profile')->as('profile.')->group(function (){
        Route::get('/', 'ProfileController@index')->name('index');
        Route::post('/updatePersonal', 'ProfileController@updatePersonal')->name('updatePersonal');
        Route::post('/updatePassword', 'ProfileController@updatePassword')->name('updatePassword');
        Route::post('/2fa', 'ProfileController@update2fa')->name('2fa');
        Route::post('/verify', 'ProfileController@verify')->name('verify');
    });



    Route::get('/trade-bot', 'TradeBotController@index')->name('trade-bot.index');
    Route::get('/trade-bot/getTickers', 'TradeBotController@getTickers')->name('trade-bot.get-tickers');
    Route::get('/trade-bot/create', 'TradeBotController@create')->name('trade-bot.create');
    Route::get('/trade-bot/edit', 'TradeBotController@edit')->name('trade-bot.edit');
    Route::post('/trade-bot', 'TradeBotController@store')->name('trade-bot.store');
    Route::put('/trade-bot/update', 'TradeBotController@update')->name('trade-bot.update');

    Route::get('/wallet', 'TradeBotController@wallet')->name('update_wallet.index');
    Route::post('/wallet', 'TradeBotController@update_wallet')->name('update_wallet.store');

//Route::get('/payment', 'PaymentController@index')->name('payment.index');
    Route::get('/payment', 'PaymentBinanceController@index')->name('payment.binance.index');
    Route::post('/payment', 'PaymentBinanceController@checkPayment')->name('payment.binance.check');
    Route::get('/success-payment', 'PaymentBinanceController@successPayment')->name('payment.success');
    Route::get('/payment-check', function (Request $request) {
            $binance = new BinanceApiDeposit();
        dd($binance->getDepositByTxId($request->txid));
    });

    Route::get('/packages', 'PaymentBinanceController@packages')->name('payment.packages');
    Route::post('/packages/subscribe/{package}', 'PaymentBinanceController@subscribe_packages')->name('payment.packages.subscribe');


    Route::get('/payment/st-wallet', 'PaymentController@st_wallet')->name('payment.st_wallet');
    Route::post('/payment/create', 'PaymentController@createPayment')->name('payment.create');
    Route::get('/payment/status/{payment_id}', 'PaymentController@getStatusPayment')->name('payment.status');

    Route::get('/st-wallet', 'STWalletController@index')->name('st-wallet.index');
//    Route::get('/st-wallet/request-withdraw', 'STWalletController@request')->name('st-wallet.request');
//    Route::post('/st-wallet/request-withdraw', 'STWalletController@request_submit')->name('st-wallet.request-submit');

    Route::get('/recommendations/medium_term', 'RecommendationsController@medium_term')->name('recommendations.medium_term');
    Route::get('/recommendations/long_term', 'RecommendationsController@long_term')->name('recommendations.long_term');

    Route::get('/withdraw', 'WithdrawController@index')->name('withdraw.index');
    Route::post('/withdraw/create', 'WithdrawController@create')->name('withdraw.create');
    Route::get('/withdraw/confirm', 'WithdrawController@view_confirm_withdraw')->name('withdraw.confirm');
    Route::get('/withdraw/confirm/resend', 'WithdrawController@resend_code')->name('withdraw.resend_code');
    Route::post('/withdraw/confirm', 'WithdrawController@confirm_withdraw')->name('withdraw.confirm.check');
    Route::get('/withdraw/report', 'WithdrawController@report')->name('withdraw.report');

    Route::get('/transfer-ST-wallet', 'WithdrawController@transfer_to_STwallet')->name('transfer-ST-wallet');
    Route::post('/transfer-ST-wallet/create', 'WithdrawController@transfer_save')->name('transfer-ST-wallet.create');


    Route::get('/reports', 'ReportsController@index')->name('reports');

    Route::get('/invite-friends', 'InviteFriendsController@index')->name('invite-friends.index');
    Route::get('/invite-friends/direct', 'InviteFriendsController@direct')->name('invite-friends.direct');
    Route::get('/invite-friends/statistics', 'InviteFriendsController@statistics')->name('invite-friends.statistics');
    Route::get('/invite-friends/gift', 'InviteFriendsController@gift')->name('invite-friends.gift');

    Route::get('/bots/{name}', 'HomeController@view_bot')->name('view-bots');

    Route::get('statistics/bots', 'StatisticsController@index')->name('statistics.bots');
    Route::get('educational-videos', 'VideoController@index')->name('videos.index');
    Route::get('educational-videos/{id}', 'VideoController@show')->name('videos.show');
});


Route::get('/email', function () {
//    return view('emails.verified-withdraw', [
//        'user' => Auth::guard('usdt')->user(),
//    ]);
    Mail::to(Auth::guard('usdt')->user())->send(new \App\Mail\VerifiedOperation(Auth::guard('usdt')->user()));
});


