<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BotsController;
use App\Http\Controllers\Admin\Broker\FastBotController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\CustomerReviewController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\FeaturesController;
use App\Http\Controllers\Admin\FrontController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\VideoPackagesController;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', 'HomeController@index')->name('home');

// Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::middleware(['admin.auth'])->group(function () {
    Route::get('/users/profile', 'ProfileController@index')->name('profile.index');
    Route::post('/users/profile/updatePassword', 'ProfileController@updatePassword')->name('profile.updatePassword');
    Route::post('/users/profile/updatePersonal', 'ProfileController@updatePersonal')->name('profile.updatePersonal');

    Route::prefix('customer-reviews')->as('customer-reviews.')->group(function () {
        Route::get('/', [CustomerReviewController::class, 'index'])->name('index');
        Route::post('/', [CustomerReviewController::class, 'store'])->name('store');
        Route::delete('/{id}', [CustomerReviewController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('feature')->as('feature.')->group(function () {
        Route::get('/', [FeaturesController::class, 'index'])->name('index');
        Route::post('/', [FeaturesController::class, 'store'])->name('store');
        Route::delete('/{id}', [FeaturesController::class, 'destroy'])->name('destroy');
    });


    Route::prefix('customers')->as('customers.')->group(function () {
        Route::get('/', 'CustomerController@index')->name('index');
        Route::get('preview/{id}/{tab?}', 'CustomerController@show')->name('show');
        Route::get('/getTickers/{id}', 'CustomerController@getTickers')->name('get-tickers');
        Route::get('/log-auth/{id}', 'CustomerController@log_auth')->name('log-auth');
        Route::get('/delete_2fa_secret/{id}', 'CustomerController@delete_2fa_secret')->name('delete_2fa_secret');
        Route::get('/{id}/invite-friends/direct', 'CustomerController@direct')->name('direct');
        Route::get('/{id}/invite-friends/statistics', 'CustomerController@statistics')->name('statistics');
        Route::post('update-status', 'CustomerController@update_status')->name('update_status');
        Route::post('send-message', 'CustomerController@send_message')->name('send_message');
        Route::post('update-wallet', 'CustomerController@update_wallet')->name('update_wallet');
    });

    Route::prefix('front')->as('front.')->group(function () {
        Route::post('update-home', [FrontController::class, 'update_home'])->name('update-home');
        Route::post('update-about', [FrontController::class, 'update_about'])->name('update-about');
        Route::post('update-policy', [FrontController::class, 'update_policy'])->name('update-policy');
        Route::post('update-videos', [FrontController::class, 'update_videos'])->name('update-videos');
        Route::get('preview/{tab?}', [FrontController::class, 'show'])->name('show');

    });

    Route::get('text-editor', 'TextEditorController@edit')->name('text-editor-edit');
    Route::post('text-editor', 'TextEditorController@update')->name('text-editor-update');

    Route::resource('/users', 'UsersController');
    Route::post('/users/send-message/{id}', 'UsersController@send_message')->name('users.send_message');

    Route::get('/read-messages', 'HomeController@read_message')->name('read-messages');

    Route::resource('/sliders', 'SlidersController');
    Route::resource('/messages', 'MessagesController');
    Route::get('/send-messages/{message}', 'MessagesController@send_message')->name('send-message');

    Route::resource('/settings', 'SettingsController')->only(['index', 'store']);


    Route::prefix('contacts')->as('contacts.')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('/{contact}', [ContactController::class, 'show'])->name('show');
        Route::post('/{contact}/sendMail', [ContactController::class, 'sendMail'])->name('sendMail');
        Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('destroy');

    });

    Route::get('mail', [MailController::class, 'index'])->name('mail.index');
    Route::post('mail/send', [MailController::class, 'send'])->name('mail.send');

    Route::prefix('faqs')->as('faqs.')->group(function () {
        Route::get('/', [FAQController::class, 'index'])->name('index');
        Route::get('/create', [FAQController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [FAQController::class, 'edit'])->name('edit');
        Route::post('/', [FAQController::class, 'store'])->name('store');
        Route::post('update/{id}', [FAQController::class, 'update'])->name('update');
        Route::delete('/{id}', [FAQController::class, 'destroy'])->name('destroy');
    });

    Route::resource('blogs', 'BlogController');

    Route::resource('plateform', 'PlateformController');

    Route::resource('bots', 'BotsController');

    Route::get('bot/all', 'BotsController@show_all')->name('bot.show-all');
    Route::get('/bots/{name}', 'BotsController@show')->name('bot.show');
    Route::get('/bot/getTickers/{id}', 'BotsController@getTickers')->name('bot.get-tickers');

    Route::get('statistics', 'StatisticsController@index')->name('statistics.index');

    Route::get('payments', 'PaymentController@index')->name('payments.index');
    Route::delete('payments/{id}', 'PaymentController@destroy')->name('payments.destroy');

    Route::get('request-withdraw', 'RequestWithdrawController@index')->name('request-withdraw.index');
    Route::get('request-withdraw/{contact}', 'RequestWithdrawController@show')->name('request-withdraw.show');
    Route::post('request-withdraw/{contact}/sendMail', 'RequestWithdrawController@sendMail')->name('request-withdraw.sendMail');
    Route::delete('request-withdraw/{contact}', 'RequestWithdrawController@destroy')->name('request-withdraw.destroy');

    Route::resource('packages', 'PackageController');

    Route::prefix('videos')->as('video.')->group(function () {
        Route::get('/', [VideoController::class, 'index'])->name('index');
        Route::get('/create', [VideoController::class, 'create'])->name('create');
        Route::post('/store', [VideoController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [VideoController::class, 'edit'])->name('edit');
        Route::put('/{id}', [VideoController::class, 'update'])->name('update');
        Route::delete('/{id}', [VideoController::class, 'destroy'])->name('destroy');

        Route::prefix('packages')->as('packages.')->group(function (){
            Route::get('/', [VideoPackagesController::class, 'index'])->name('index');
            Route::post('/', [VideoPackagesController::class, 'store'])->name('store');
            Route::delete('/{id}', [VideoPackagesController::class, 'destroy'])->name('destroy');
        });
    });

});





