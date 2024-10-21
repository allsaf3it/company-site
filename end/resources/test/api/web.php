<?php

use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Usdt\Auth\RegisterController;
use App\Notifications\NewsNotification;
use App\Payments\NowPaymentsAPI;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('glogin', array('as' => 'glogin', 'uses' => 'UserController@googleLogin'));
Route::get('upload-file', array('as' => 'upload-file', 'uses' => 'UserController@uploadFileUsingAccessToken'));

Route::group([
    'as' => 'front.',
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']

], function () {
    Route::get('/', 'FrontController@index')->name('home');

    Route::get('/contact-us', 'FrontController@contact')->name('contact-us');
    Route::post('/contact-us', 'FrontController@contact_save')->name('contact-us.save');

    Route::get('/blogs', 'FrontController@blogs')->name('blogs');
    Route::get('/faqs', 'FrontController@faqs')->name('faqs');
    Route::get('/about-us', 'FrontController@aboutUs')->name('about-us');
    Route::get('/privacy-policy', 'FrontController@policy')->name('policy');
    Route::get('/platforms', 'FrontController@plateforms')->name('plateforms');
    Route::get('/result/search/blogs', 'FrontController@searchBlogs')->name('result.blogs');
    Route::get('/blogs/{id}', 'FrontController@singleBlog')->name('single-blog');

    Route::get('/courses', 'FrontController@courses')->name('courses');
    Route::get('/courses/{id}', 'FrontController@singleCourses')->name('singleCourses');
    Route::get('/videos/{id}', 'FrontController@video')->name('video');

});

Route::get('/getMassage', 'FrontController@getMassage')->name('getMassage');
Route::get('/invite-user/{share_id}', 'FrontController@invite')->name('invite_user');

Route::get('sitemap.xml', [SitemapController::class, 'index']);

Route::get('checkout-create', [\App\Http\Controllers\Usdt\P2PController::class, 'checkout_create'])->name('p2p.checkout-create');
Route::get('invoice', [\App\Http\Controllers\Usdt\P2PController::class, 'invoice'])->name('invoice');

Route::get('pay-stripe', 'StripePaymentController@payment_process_3d')->name('pay-stripe');
Route::get('pay-stripe/success/{transaction_id}', 'StripePaymentController@success')->name('pay-stripe.success');
Route::get('pay-stripe/fail/{transaction_id}', 'StripePaymentController@fail')->name('pay-stripe.fail');
