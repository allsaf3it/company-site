<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\PricingController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\SeoAssistantContoller;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\BotController;
use App\Http\Controllers\Backend\AboutValuesController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\GalleryImagesController;
use App\Http\Controllers\Backend\GalleryVideosController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ConfigrationController;
use App\Http\Controllers\Backend\MenuItemController;
use App\Http\Controllers\Backend\AboutStrucController;
use App\Http\Controllers\Backend\BlogsController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\TestimonialsController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardMenuItemController;
use App\Http\Controllers\Dashboard\TradeBotChildController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Dashboard\TradeBotController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Dashboard\HomeSliderController;
use App\Http\Controllers\Auth\TwoFactorAuthenticationController;


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
Route::group(['middleware'=>['web','localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],'prefix' => LaravelLocalization::setLocale() ],function(){
    // require __DIR__.'/auth.php';
    Route::get('/', [WebsiteController::class, 'home']);
    Route::get('/about-us', [WebsiteController::class, 'aboutUs']);
    Route::get('/products', [WebsiteController::class, 'products']);
    Route::get('/product/{link}', [WebsiteController::class, 'getProductDetails']);
    Route::get('/categories', [WebsiteController::class, 'categories']);
    Route::get('/category/{link}', [WebsiteController::class, 'getCategoryDetails']);
    Route::get('/blogs', [WebsiteController::class, 'blogs']);
    Route::get('/blog/{link}', [WebsiteController::class, 'getBlogDetails']);
    Route::get('/services', [WebsiteController::class, 'getservices']);
    Route::get('/service/{link}', [WebsiteController::class, 'getServiceDetails']);
    Route::get('/courses', [WebsiteController::class, 'getCourses']);
    Route::get('/course/{link}', [WebsiteController::class, 'getCourseDetails']);
    Route::get('/projects', [WebsiteController::class, 'getProjects']);
    Route::get('/project/{link}', [WebsiteController::class, 'getProjectDetails']);
    Route::get('/gallery', [WebsiteController::class, 'gallery']);
    Route::get('/videos', [WebsiteController::class, 'video']);
    Route::get('/contact', [WebsiteController::class, 'contactUs']);
    Route::post('/save/contact-us', [WebsiteController::class, 'saveContactUs'])->name('saveContactUs');
    Route::get('/lang/{lang}', [WebsiteController::class, 'setlang']);
    Route::get('/test', [TestController::class, 'index']);
    Route::middleware(['userauth', 'CheckUser'])->prefix('dashboard')->group(function() {
        Route::get('/auth/user/2fa', [TwoFactorAuthenticationController::class, 'index']);
        Route::get('/home', [DashboardController::class, 'index'])->name('dashboard.home');
        Route::get('/profile', [DashboardController::class, 'getProfile']);
        Route::post('/update-profile', [DashboardController::class, 'updateProfile']);
        Route::post('/update-password', [DashboardController::class, 'updatePassword']);
        Route::get('/bot/{link}', [DashboardController::class, 'getBot']);
        Route::get('/bot/details/{link}', [DashboardController::class, 'getBotDetails']);
        Route::get('/packages', [DashboardController::class, 'getPackages']);
        Route::post('/upgrade', [DashboardController::class, 'upgrade']);
        Route::post('/save-my-wallet', [DashboardController::class, 'saveMyWallet']);
        Route::get('/st-wallet', [DashboardController::class, 'getSTwallet']);
        Route::get('/transfer-stwallet', [DashboardController::class, 'getTransferStWallet'])->name('transfer-stwallet');
        Route::post('/save-transfer-stwallet', [DashboardController::class, 'saveTransferStWallet']);
        Route::get('/withdraw', [DashboardController::class, 'getWithdraw']);
        Route::post('/save-withdraw', [DashboardController::class, 'saveWithdraw']);
        Route::get('/deposite', [DashboardController::class, 'deposite'])->name('deposite');
        Route::post('/saveTxid', [DashboardController::class, 'saveTxid'])->name('saveTxid');
        Route::get('/terms-and-conditions', [DashboardController::class, 'getTermsAndConditions']);
        Route::get('/faqs', [DashboardController::class, 'getFaq']);
        Route::group(['middleware' => 'checkPackage'], function(){
            Route::get('/invite-friends', [DashboardController::class, 'getInviteFriends'])->name('invitefriends');
            Route::get('/medium-term', [DashboardController::class, 'getMediumTerm']);
            Route::get('/search-medium-term', [DashboardController::class, 'searchMediumTerm']);
            Route::get('/long-term', [DashboardController::class, 'getLongTerm']);
            Route::get('/search-long-term', [DashboardController::class, 'searchLongTerm']);
            Route::get('/my-bots', [DashboardController::class, 'getMyBots'])->name('my-bots');
            Route::get('/my-bots/details/{link}', [DashboardController::class, 'getMyBotDetails']);
            Route::post('/save/usdt', [DashboardController::class, 'saveUsdt'])->name('saveUsdt')->middleware('password.confirm');
            Route::post('/stop/bot/{id}', [DashboardController::class, 'stopBot'])->name('stopBot');
            Route::post('/shutdown-all', [DashboardController::class, 'shutdownAllBots'])->name('shutdownAllBots');
            Route::get('/my-wallet', [DashboardController::class, 'getMyWallet']);
        });

    });

});

// user dashboard
// Route::middleware(['auth'])->group(function(){
//     Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
//     Route::post('/user/profile/store', [UserController::class, 'userProfileStore'])->name('user.profile.store');
//     Route::get('/user/logout', [UserController::class, 'userDestroy'])->name('user.logout');
//     Route::post('/user/update/password', [UserController::class, 'userUpdatePassword'])->name('user.update.password');

// }); // Group middleware End
//end user dashboard
  
Route::get('/complete-registration', [RegisteredUserController::class, 'completeRegistration'])->name('complete.registration');

// admin dashboard
Route::middleware(['auth', 'CheckAdmin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'adminUpdatePassword'])->name('update.password');
});

// end admin dashboard

// vendor dashboard
// Route::middleware(['auth', 'role:vendor'])->group(function(){
//     Route::get('/vendor/dashboard', [VendorController::class, 'vendorDashboard'])->name('vendor.dashboard');
//     Route::get('/vendor/logout', [VendorController::class, 'vendorDestroy'])->name('vendor.logout');
//     Route::get('/vendor/profile', [VendorController::class, 'vendorProfile'])->name('vendor.profile');
//     Route::post('/vendor/profile/store', [VendorController::class, 'vendorProfileStore'])->name('vendor.profile.store');
//     Route::get('/vendor/change/password', [VendorController::class, 'vendorChangePassword'])->name('vendor.change.password');
//     Route::post('/vendor/update/password', [VendorController::class, 'vendorUpdatePassword'])->name('vendor.update.password');
// });
// end vendor dashboard

Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
// Route::get('/vendor/login', [VendorController::class, 'vendorLogin']);

Route::middleware(['auth', 'CheckAdmin'])->prefix('admin')->group(function(){
    Route::resource('roles', RoleController::class);
    // About all routes
    Route::get('/editAbout', [AboutController::class, 'editAbout'])->name('admin.editAbout');
    Route::post('/about/update', [AboutController::class, 'update'])->name('admin.about.update');
    // end about routes
    #####################################################################################################################
    // homeSliders all routes
    Route::get('/all/homeSlider', [HomeSliderController::class, 'index'])->name('all.homeslider');
    Route::get('/add/homeSlider', [HomeSliderController::class, 'create'])->name('add.homeslider');
    Route::post('/store/homeSlider', [HomeSliderController::class, 'store'])->name('store.homeslider');
    Route::get('/edit/homeSlider/{id}', [HomeSliderController::class, 'edit'])->name('edit.homeslider');
    Route::post('/update/homeSlider', [HomeSliderController::class, 'update'])->name('update.homeslider');
    Route::get('/delete/homeSlider/{id}', [HomeSliderController::class, 'destroy'])->name('delete.homeslider');
    // end homeSliders routes
    #####################################################################################################################
    #####################################################################################################################
    // admins all routes
    Route::get('/all/users', [UserController::class, 'index'])->name('all.user');
    Route::get('/add/user', [UserController::class, 'create'])->name('add.user');
    Route::post('/store/user', [UserController::class, 'store'])->name('store.user');
    Route::get('/edit/user/{id}', [UserController::class, 'edit'])->name('edit.user');
    Route::post('/update/user', [UserController::class, 'update'])->name('update.user');
    Route::get('/delete/user/{id}', [UserController::class, 'destroy'])->name('delete.user');
    // end admins routes
    #####################################################################################################################
    #####################################################################################################################
    // users all routes
    Route::get('/all/user-dashboard', [UserDashboardController::class, 'index'])->name('all.user_dashboard');
    // Route::get('/add/user-dashboard', [UserDashboardController::class, 'create'])->name('add.user_dashboard');
    // Route::post('/store/user-dashboard', [UserDashboardController::class, 'store'])->name('store.user_dashboard');
    Route::get('/edit/user-dashboard/{id}', [UserDashboardController::class, 'edit'])->name('edit.user_dashboard');
    Route::post('/update/user-dashboard', [UserDashboardController::class, 'update'])->name('update.user_dashboard');
    // Route::get('/delete/user-dashboard/{id}', [UserDashboardController::class, 'destroy'])->name('delete.user_dashboard');
    // end users routes
    #####################################################################################################################
    #####################################################################################################################
    // roles all routes
    Route::get('/all/roles', [RoleController::class, 'index'])->name('all.role');
    Route::get('/add/role', [RoleController::class, 'create'])->name('add.role');
    Route::post('/store/role', [RoleController::class, 'store'])->name('store.role');
    Route::get('/edit/role/{id}', [RoleController::class, 'edit'])->name('edit.role');
    Route::post('/update/role', [RoleController::class, 'update'])->name('update.role');
    Route::get('/delete/role/{id}', [RoleController::class, 'destroy'])->name('delete.role');
    // end roles routes
    #####################################################################################################################
    #####################################################################################################################
    // permissions all routes
    Route::get('/all/permissions', [PermissionController::class, 'index'])->name('all.permission');
    Route::get('/add/permission', [PermissionController::class, 'create'])->name('add.permission');
    Route::post('/store/permission', [PermissionController::class, 'store'])->name('store.permission');
    Route::get('/edit/permission/{id}', [PermissionController::class, 'edit'])->name('edit.permission');
    Route::post('/update/permission', [PermissionController::class, 'update'])->name('update.permission');
    Route::get('/delete/permission/{id}', [PermissionController::class, 'destroy'])->name('delete.permission');
    // end permissions routes
    #####################################################################################################################
    // AboutValues all routes
    Route::get('/all/aboutValues', [AboutValuesController::class, 'index'])->name('all.aboutValues');
    Route::get('/add/aboutValues', [AboutValuesController::class, 'create'])->name('add.aboutValues');
    Route::post('/store/aboutValues', [AboutValuesController::class, 'store'])->name('store.aboutValues');
    Route::get('/edit/aboutValues/{id}', [AboutValuesController::class, 'edit'])->name('edit.aboutValues');
    Route::post('/update/aboutValues', [AboutValuesController::class, 'update'])->name('update.aboutValues');
    Route::get('/delete/aboutValues/{id}', [AboutValuesController::class, 'destroy'])->name('delete.aboutValues');
    // end AboutValues routes
    #####################################################################################################################
    // aboutStruc all routes
    Route::get('/all/aboutStruc', [AboutStrucController::class, 'index'])->name('all.aboutStruc');
    Route::get('/add/aboutStruc', [AboutStrucController::class, 'create'])->name('add.aboutStruc');
    Route::post('/store/aboutStruc', [AboutStrucController::class, 'store'])->name('store.aboutStruc');
    Route::get('/edit/aboutStruc/{id}', [AboutStrucController::class, 'edit'])->name('edit.aboutStruc');
    Route::post('/update/aboutStruc', [AboutStrucController::class, 'update'])->name('update.aboutStruc');
    Route::get('/delete/aboutStruc/{id}', [AboutStrucController::class, 'destroy'])->name('delete.aboutStruc');
    // end about Struc routes
    #####################################################################################################################
    #####################################################################################################################
    // categories all routes
    Route::get('/all/categories', [CategoriesController::class, 'index'])->name('all.category');
    Route::get('/add/categories', [CategoriesController::class, 'create'])->name('add.category');
    Route::post('/store/categories', [CategoriesController::class, 'store'])->name('store.category');
    Route::get('/edit/categories/{id}', [CategoriesController::class, 'edit'])->name('edit.category');
    Route::post('/update/categories', [CategoriesController::class, 'update'])->name('update.category');
    Route::get('/delete/categories/{id}', [CategoriesController::class, 'destroy'])->name('delete.category');
    // end categories routes
    #####################################################################################################################
    // products all routes
    Route::get('/all/products', [ProductsController::class, 'index'])->name('all.products');
    Route::get('/add/products', [ProductsController::class, 'create'])->name('add.products');
    Route::post('/store/products', [ProductsController::class, 'store'])->name('store.products');
    Route::get('/edit/products/{id}', [ProductsController::class, 'edit'])->name('edit.products');
    Route::post('/update/products', [ProductsController::class, 'update'])->name('update.products');
    Route::get('/delete/products/{id}', [ProductsController::class, 'destroy'])->name('delete.products');
    Route::post('/products/uploadImages', [ProductsController::class, 'uploadImages']);
    Route::post('/products/removeUploadImages', [ProductsController::class, 'removeUploadImages']);
    Route::post('/products/deleteImege', [ProductsController::class, 'deleteImege']);
    // end products routes
    #####################################################################################################################
    #####################################################################################################################
    // services all routes
    Route::get('/all/services', [ServicesController::class, 'index'])->name('all.service');
    Route::get('/add/services', [ServicesController::class, 'create'])->name('add.service');
    Route::post('/store/services', [ServicesController::class, 'store'])->name('store.service');
    Route::get('/edit/services/{id}', [ServicesController::class, 'edit'])->name('edit.service');
    Route::post('/update/services', [ServicesController::class, 'update'])->name('update.service');
    Route::get('/delete/services/{id}', [ServicesController::class, 'destroy'])->name('delete.service');
    Route::post('/services/uploadImages', [ServicesController::class, 'uploadImages']);
    Route::post('/services/removeUploadImages', [ServicesController::class, 'removeUploadImages']);
    Route::post('/services/deleteImege', [ServicesController::class, 'deleteImege']);
    // end services routes
    #####################################################################################################################
    #####################################################################################################################
    // courses all routes
    Route::get('/all/courses', [CourseController::class, 'index'])->name('all.course');
    Route::get('/add/course', [CourseController::class, 'create'])->name('add.course');
    Route::post('/store/course', [CourseController::class, 'store'])->name('store.course');
    Route::get('/edit/course/{id}', [CourseController::class, 'edit'])->name('edit.course');
    Route::post('/update/course', [CourseController::class, 'update'])->name('update.course');
    Route::get('/delete/course/{id}', [CourseController::class, 'destroy'])->name('delete.course');
    // end courses routes
    #####################################################################################################################
    #####################################################################################################################
    // bots all routes
    Route::get('/all/bots', [BotController::class, 'index'])->name('all.bot');
    Route::get('/add/bot', [BotController::class, 'create'])->name('add.bot');
    Route::post('/store/bot', [BotController::class, 'store'])->name('store.bot');
    Route::get('/edit/bot/{id}', [BotController::class, 'edit'])->name('edit.bot');
    Route::post('/update/bot', [BotController::class, 'update'])->name('update.bot');
    Route::get('/delete/bot/{id}', [BotController::class, 'destroy'])->name('delete.bot');
    // end bots routes
    #####################################################################################################################
    #####################################################################################################################
    // bots all routes
    Route::get('/all/clients', [ClientController::class, 'index'])->name('all.client');
    Route::get('/add/client', [ClientController::class, 'create'])->name('add.client');
    Route::post('/store/client', [ClientController::class, 'store'])->name('store.client');
    Route::get('/edit/client/{id}', [ClientController::class, 'edit'])->name('edit.client');
    Route::post('/update/client', [ClientController::class, 'update'])->name('update.client');
    Route::get('/delete/client/{id}', [ClientController::class, 'destroy'])->name('delete.client');
    // end bots routes
    #####################################################################################################################
    #####################################################################################################################
    // faqs all routes
    Route::get('/all/faqs', [FaqController::class, 'index'])->name('all.faq');
    Route::get('/add/faq', [FaqController::class, 'create'])->name('add.faq');
    Route::post('/store/faq', [FaqController::class, 'store'])->name('store.faq');
    Route::get('/edit/faq/{id}', [FaqController::class, 'edit'])->name('edit.faq');
    Route::post('/update/faq', [FaqController::class, 'update'])->name('update.faq');
    Route::get('/delete/faq/{id}', [FaqController::class, 'destroy'])->name('delete.faq');
    // end faqs routes
    #####################################################################################################################
    // galleryImages all routes
    Route::get('/all/galleryImages', [GalleryImagesController::class, 'index'])->name('all.gallery');
    Route::get('/add/galleryImages', [GalleryImagesController::class, 'create'])->name('add.gallery');
    Route::post('/store/galleryImages', [GalleryImagesController::class, 'store'])->name('store.gallery');
    Route::get('/edit/galleryImages/{id}', [GalleryImagesController::class, 'edit'])->name('edit.gallery');
    Route::post('/update/galleryImages', [GalleryImagesController::class, 'update'])->name('update.gallery');
    Route::get('/delete/galleryImages/{id}', [GalleryImagesController::class, 'destroy'])->name('delete.gallery');
    // end galleryImages routes
    #####################################################################################################################
    // galleryImages all routes
    Route::get('/all/galleryvideos', [GalleryVideosController::class, 'index'])->name('all.video');
    Route::get('/add/galleryvideos', [GalleryVideosController::class, 'create'])->name('add.video');
    Route::post('/store/galleryvideos', [GalleryVideosController::class, 'store'])->name('store.video');
    Route::get('/edit/galleryvideos/{id}', [GalleryVideosController::class, 'edit'])->name('edit.video');
    Route::post('/update/galleryvideos', [GalleryVideosController::class, 'update'])->name('update.video');
    Route::get('/delete/galleryvideos/{id}', [GalleryVideosController::class, 'destroy'])->name('delete.video');
    // end galleryImages routes
    #####################################################################################################################
    #####################################################################################################################
    // testimonials all routes
    Route::get('/all/testimonials', [TestimonialsController::class, 'index'])->name('all.testimonial');
    Route::get('/add/testimonials', [TestimonialsController::class, 'create'])->name('add.testimonial');
    Route::post('/store/testimonials', [TestimonialsController::class, 'store'])->name('store.testimonial');
    Route::get('/edit/testimonials/{id}', [TestimonialsController::class, 'edit'])->name('edit.testimonial');
    Route::post('/update/testimonials', [TestimonialsController::class, 'update'])->name('update.testimonial');
    Route::get('/delete/testimonials/{id}', [TestimonialsController::class, 'destroy'])->name('delete.testimonial');
    // end testimonials routes
    #####################################################################################################################
    #####################################################################################################################
    // blogs all routes
    Route::get('/all/blogs', [BlogsController::class, 'index'])->name('all.blogs');
    Route::get('/add/blogs', [BlogsController::class, 'create'])->name('add.blogs');
    Route::post('/store/blogs', [BlogsController::class, 'store'])->name('store.blogs');
    Route::get('/edit/blogs/{id}', [BlogsController::class, 'edit'])->name('edit.blogs');
    Route::post('/update/blogs', [BlogsController::class, 'update'])->name('update.blogs');
    Route::get('/delete/blogs/{id}', [BlogsController::class, 'destroy'])->name('delete.blogs');
    // end blogs routes
    #####################################################################################################################
    #####################################################################################################################
    // projects all routes
    Route::get('/all/projects', [ProjectController::class, 'index'])->name('all.project');
    Route::get('/add/project', [ProjectController::class, 'create'])->name('add.project');
    Route::post('/store/project', [ProjectController::class, 'store'])->name('store.project');
    Route::get('/edit/project/{id}', [ProjectController::class, 'edit'])->name('edit.project');
    Route::post('/update/project', [ProjectController::class, 'update'])->name('update.project');
    Route::get('/delete/project/{id}', [ProjectController::class, 'destroy'])->name('delete.project');
    Route::post('/projects/uploadImages', [ProjectController::class, 'uploadImages']);
    Route::post('/projects/removeUploadImages', [ProjectController::class, 'removeUploadImages']);
    Route::post('/projects/deleteImege', [ProjectController::class, 'deleteImege']);
    // end projects routes
    #####################################################################################################################
    // contactus all routes
    Route::get('/all/contactus', [ContactUsController::class, 'index'])->name('all.contactus');
    Route::get('/edit/contactus/{id}', [ContactUsController::class, 'edit'])->name('edit.contactus');
    Route::get('/delete/contactus/{id}', [ContactUsController::class, 'destroy'])->name('delete.contactus');
    // end contactus routes
    #####################################################################################################################
    // seo all routes
    Route::get('/edit/seo', [SeoAssistantContoller::class, 'index'])->name('admin.edit.seo');
    Route::post('/seo/update', [SeoAssistantContoller::class, 'update'])->name('admin.seo.update');
    // end seo routes
    #####################################################################################################################
    #####################################################################################################################
    // setting all routes
    Route::get('/edit/setting', [SettingController::class, 'editAbout'])->name('admin.edit.setting');
    Route::post('/setting/update', [SettingController::class, 'update'])->name('admin.setting.update');
    // end setting routes
    #####################################################################################################################
    #####################################################################################################################
    // setting all routes
    Route::get('/edit/configration', [ConfigrationController::class, 'editAbout'])->name('admin.edit.configration');
    Route::post('/configration/update', [ConfigrationController::class, 'update'])->name('admin.configration.update');
    // end setting routes
    #####################################################################################################################
    #####################################################################################################################
    // MenuItems all routes
    Route::get('/all/menuItems', [MenuItemController::class, 'index'])->name('all.menuitem');
    Route::get('/add/menuItem', [MenuItemController::class, 'create'])->name('add.menuitem');
    Route::post('/store/menuItem', [MenuItemController::class, 'store'])->name('store.menuitem');
    Route::get('/edit/menuItem/{id}', [MenuItemController::class, 'edit'])->name('edit.menuitem');
    Route::post('/update/menuItem', [MenuItemController::class, 'update'])->name('update.menuitem');
    Route::get('/delete/menuItem/{id}', [MenuItemController::class, 'destroy'])->name('delete.menuitem');
    // end MenuItems routes
    #####################################################################################################################
    #####################################################################################################################
    // dashboardMenuitem all routes
    Route::get('/all/dashboard-menuItems', [DashboardMenuItemController::class, 'index'])->name('all.dashboardMenuitem');
    Route::get('/add/dashboard-menuItem', [DashboardMenuItemController::class, 'create'])->name('add.dashboardMenuitem');
    Route::post('/store/dashboard-menuItem', [DashboardMenuItemController::class, 'store'])->name('store.dashboardMenuitem');
    Route::get('/edit/dashboard-menuItem/{id}', [DashboardMenuItemController::class, 'edit'])->name('edit.dashboardMenuitem');
    Route::post('/update/dashboard-menuItem', [DashboardMenuItemController::class, 'update'])->name('update.dashboardMenuitem');
    Route::get('/delete/dashboard-menuItem/{id}', [DashboardMenuItemController::class, 'destroy'])->name('delete.dashboardMenuitem');
    // end dashboardMenuitem routes
    #####################################################################################################################
    #####################################################################################################################
    // pricing all routes
    Route::get('/all/pricing', [PricingController::class, 'index'])->name('all.pricing');
    Route::get('/add/pricing', [PricingController::class, 'create'])->name('add.pricing');
    Route::post('/store/pricing', [PricingController::class, 'store'])->name('store.pricing');
    Route::get('/edit/pricing/{id}', [PricingController::class, 'edit'])->name('edit.pricing');
    Route::post('/update/pricing', [PricingController::class, 'update'])->name('update.pricing');
    Route::get('/delete/pricing/{id}', [PricingController::class, 'destroy'])->name('delete.pricing');
    // end pricing routes
    #####################################################################################################################

    ######################################## dashboard ##########################################################
    #####################################################################################################################
    // tradeBot all routes
    Route::get('/all/tradeBot', [TradeBotController::class, 'index'])->name('all.tradeBot');
    Route::get('/add/tradeBot', [TradeBotController::class, 'create'])->name('add.tradeBot');
    Route::post('/store/tradeBot', [TradeBotController::class, 'store'])->name('store.tradeBot');
    Route::get('/edit/tradeBot/{id}', [TradeBotController::class, 'edit'])->name('edit.tradeBot');
    Route::post('/update/tradeBot', [TradeBotController::class, 'update'])->name('update.tradeBot');
    Route::get('/delete/tradeBot/{id}', [TradeBotController::class, 'destroy'])->name('delete.tradeBot');
    // end tradeBot routes
    #####################################################################################################################
        #####################################################################################################################
    // tradeBotChild all routes
    Route::get('/all/tradeBotChild', [TradeBotChildController::class, 'index'])->name('all.tradeBotChild');
    Route::get('/add/tradeBotChild', [TradeBotChildController::class, 'create'])->name('add.tradeBotChild');
    Route::post('/store/tradeBotChild', [TradeBotChildController::class, 'store'])->name('store.tradeBotChild');
    Route::get('/edit/tradeBotChild/{id}', [TradeBotChildController::class, 'edit'])->name('edit.tradeBotChild');
    Route::post('/update/tradeBotChild', [TradeBotChildController::class, 'update'])->name('update.tradeBotChild');
    Route::get('/delete/tradeBotChild/{id}', [TradeBotChildController::class, 'destroy'])->name('delete.tradeBotChild');
    // end tradeBotChild routes
    #####################################################################################################################

});//end middleware
