<?php

use App\MenuItem;
use App\Http\Controllers\HelloAdminController;

Route::group(['middleware'=>['web','localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],'prefix' => LaravelLocalization::setLocale() ],function(){
    Route::get('/thanks',function() {
        if(session()->has('contact_message')) {
            return view('thanks');
        }
        return redirect('/');
    })->name('thanks');
    Route::get('/sitemap.xml','SiteMapController@index');
    Route::get('/services-sitemap.xml','SiteMapController@services');
    Route::get('/brands-sitemap.xml','SiteMapController@brands');
    Route::get('/categories-sitemap.xml','SiteMapController@categories');
    Route::get('/projects-sitemap.xml','SiteMapController@projects');
    Route::get('/pages-sitemap.xml','SiteMapController@pages');
    Route::get('/blogs-sitemap.xml','SiteMapController@blogs');


    Route::get('/lang/{lang}', 'AdminController@setlang');
    Route::get('/what-we-do','WebsiteController@home');
    Route::get('/','HelloController@hello');
    Route::get('/security-plans', 'HelloController@securitymainPage')->name('security');
    // Route::get('/security', 'HelloController@securitymainPage')->name('securitypage');

    Route::get('about-us','WebsiteController@aboutUs');
    Route::get('contact-us','WebsiteController@contactUs');
    Route::post('save/contact-us','WebsiteController@saveContactUs');
    Route::get('page/{link}','WebsiteController@getPage');
    Route::get('blogs','WebsiteController@getBlogs');
    Route::get('privacy','WebsiteController@getPrivacy');
    Route::get('projects','WebsiteController@getProjects');
    Route::get('project/{id}/details','WebsiteController@getProjectDetails');
    Route::get('about-writer/{id}','WebsiteController@getWriter')->name('writer.details');
    Route::get('services','WebsiteController@getservices');
    Route::get('courses','WebsiteController@getCourses');
    Route::get('galleryImages','WebsiteController@getGalleryImages');
    Route::get('blogs/{id}','WebsiteController@getCategoryBlogs');
    Route::get('galleryVideos','WebsiteController@getGalleryVideos');
    Route::post('save/comment','WebsiteController@saveComment');
    Route::get('service/{link}','WebsiteController@getServiceDetails');
    Route::get('project/{link}','WebsiteController@getProjectDetails');
    Route::get('course/{link}','WebsiteController@getCourseDetails');
    Route::get('blog/{link}','WebsiteController@getBlogPage');
    Route::get('career','WebsiteController@career');
    Route::post('save/career','WebsiteController@saveCareer');
});

Route::group(['middleware'=>['web','auth']],function(){

});

Route::group(['middleware'=>['admin','web'],'prefix'=>'admin'],function(){
    Route::get('', 'AdminController@admin');
    Route::get('translations', 'AdminController@translations');
    Route::get('/switch-theme', 'AdminController@switchTheme');
    Route::post('{name}/up/{ids}','AdminController@updatestatus');
    Route::resource('/settings', 'SettingController');
    Route::resource('/writers', 'WriterController');
    Route::resource('/configrations', 'ConfigrationController');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('careers', 'CareerContoller');
    Route::resource('permissions', 'PermissionController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('jobs', 'JobsController');
    Route::resource('pages', 'PageController');
    Route::resource('menus', 'MenuController');
    Route::resource('menu-items', 'MenuItemController');
    Route::post('menuTypeValue', 'MenuItemController@menuTypeValue')->name('menuTypeValue');
    Route::resource('intro-sliders', 'IntroSliderController');
    Route::resource('home-sliders', 'HomeSliderController');
    Route::resource('offers-sliders', 'OfferSliderController');
    Route::resource('services', 'ServiceController');
    Route::resource('courses', 'CourseController');
    Route::resource('inspiros', 'InspiroController');
    Route::post('services/uploadImages', 'ServiceController@uploadImages');
    Route::post('services/removeUploadImages', 'ServiceController@removeUploadImages');
    Route::post('services/deleteImege', 'ServiceController@deleteImege');
    Route::get('editAbout','AboutController@editAbout')->name('admin.editAbout');
    Route::PATCH('about/update','AboutController@update')->name('admin.about.update');
    Route::get('editHello','HelloAdminController@editHello')->name('admin.editHello');
    Route::PATCH('hello/update','HelloAdminController@update')->name('admin.hello.update');
    Route::post('menuTypeValue', 'MenuItemController@menuTypeValue')->name('menuTypeValue');
    Route::resource('aboutStrucs', 'AboutStrucController');
    Route::resource('contact-us-messages', 'ContactusController');
    Route::resource('brands', 'BrandController');
    Route::resource('brandsreel', 'BrandReelController');
    Route::resource('postcards', 'PostcardsController');
    Route::resource('achievements', 'AchievementController');
    Route::resource('pages', 'PageController');
    Route::resource('blog-categories', 'BlogCategoryController');
    Route::resource('blog-items', 'BlogItemController');
    Route::post('updateFaq', 'BlogItemController@updateFaq')->name('updateFaq');
    Route::post('removeFaq', 'BlogItemController@removeFaq')->name('removeFaq');
    Route::resource('home-images', 'HomeImageController');
    Route::resource('gallery-images', 'GalleryImageController');
    Route::post('gallery-images/deleteImege', 'GalleryImageController@deleteImege');
    Route::post('gallery-images/reorder','GalleryImageController@reorderImeges');
    Route::get('gallery-image/create-pluck','GalleryImageController@createPluck');
    Route::post('gallery-images/uploadImages','GalleryImageController@uploadImages');
    Route::post('gallery-images/removeUploadImages','GalleryImageController@removeUploadImages');
    Route::post('gallery-images/storePluck','GalleryImageController@storePluck');
    Route::resource('testimonials', 'TestimonialController');
    Route::resource('news-letters', 'NewsLetterController');
    Route::resource('projects', 'ProjectController');
    Route::post('projects/uploadImages', 'ProjectController@uploadImages');
    Route::post('projects/removeUploadImages', 'ProjectController@removeUploadImages');
    Route::post('projects/deleteImege', 'ProjectController@deleteImege');
    Route::resource('addresses', 'AddressController');
    Route::resource('gallery-videos', 'GalleryVideoController');
    Route::post('gallery-videos/reorder','GalleryVideoController@reorderVideos');
    Route::resource('seo-assistant', 'SeoAssistantContoller');
    Route::get('editFaq', 'FaqController@editFaq');
    Route::post('storeFaq', 'FaqController@storeFaq');
    Route::post('updateGeneralFaq', 'FaqController@updateGeneralFaq')->name('updateGeneralFaq');
    Route::post('removeGeneralFaq', 'FaqController@removeGeneralFaq')->name('removeGeneralFaq');
    
    
    Route::prefix('security/page/data')->group(function(){
        Route::get('/','SecurityAdminController@index')->name('securityAdmin');
        Route::post('/add','SecurityAdminController@store')->name('securityAdminadd');
        Route::post('/edit','SecurityAdminController@update')->name('securityAdminedit');
        Route::prefix('image')->group(function(){
            Route::get('/list','SecurityAdminController@listimage')->name('listimage');
            Route::get('/create','SecurityAdminController@createimage')->name('createimage');
            Route::get('/edit/{id}','SecurityAdminController@editimage')->name('editimage');
            Route::get('/delete/{id}','SecurityAdminController@deleteimage')->name('deleteimage');
        });
        Route::prefix('statitcs')->group(function(){
            Route::get('/list','SecurityAdminController@showstatics')->name('showstatics');
            Route::get('/create','SecurityAdminController@createtatics')->name('createtatics');
            Route::get('/edit/{id}','SecurityAdminController@edittatics')->name('edittatics');
            Route::get('/delete/{id}','SecurityAdminController@deletetatics')->name('deletetatics');
        });
        Route::prefix('feature')->group(function(){
            Route::get('/list','SecurityAdminController@showfeature')->name('showfeature');
            Route::get('/edit/{id}','SecurityAdminController@editfeature')->name('editfeature');
            Route::get('/delete/{id}','SecurityAdminController@deletefeature')->name('deletefeature');
            Route::get('/detils/add/{id}','SecurityAdminController@moredetails')->name('moredetails');
            Route::get('/createfeaturedetails/{id}','SecurityAdminController@createfeaturedetails')->name('createfeaturedetails');
            Route::post('/storefeaturedetails','SecurityAdminController@storefeaturedetails')->name('storefeaturedetails');
            Route::get('/editfeaturedetails/{id}','SecurityAdminController@editfeaturedetails')->name('editfeaturedetails');
            Route::post('/updatefeaturedetails','SecurityAdminController@updatefeaturedetails')->name('updatefeaturedetails');
            Route::get('/deletefeaturedetails/{id}','SecurityAdminController@deletefeaturedetails')->name('deletefeaturedetails');
        });
        Route::prefix('goal')->group(function(){
            Route::get('/list','SecurityAdminController@listgoal')->name('listgoal');
            Route::get('/edit/{id}','SecurityAdminController@editgoal')->name('editgoal');
            Route::post('/update','SecurityAdminController@updategoal')->name('updategoal');
            Route::get('/delete/{id}','SecurityAdminController@deletegoal')->name('deletegoal');
        });
        Route::prefix('lastsection')->group(function(){
            Route::get('/list','SecurityAdminController@lastsection')->name('lastsection');
            Route::get('/edit/{id}','SecurityAdminController@editlastsection')->name('editlastsection');
            Route::post('/update','SecurityAdminController@updategoal')->name('updatelastsection');
            Route::get('/delete/{id}','SecurityAdminController@deletegoal')->name('deletelastsection');
        });
    });

});

//////////// clearing cach and cache config///////
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    return 'DONE'; //Return anything
});

Auth::routes();
Route::group(['middleware'=>['web','localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],'prefix' => LaravelLocalization::setLocale() ],function(){
 Route::get('{slug}/','WebsiteController@checkUrl')->name('checkUrl');
});


