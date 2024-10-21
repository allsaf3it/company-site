<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App;
use View;
use App\Setting;
use App\Configration;
use App\MenuItem;
use App\Page;
use Auth;
use App\Category;
use App\Service;
use App\GalleryImage;
use App\Address;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        \URL::forceScheme('https');

        view()->composer('*', function($view)
        {
            $setting = Setting::first();
            $lang = $setting->default_lang;
            if(session()->has('lang'))
            {
              $lang = session()->get('lang');
            }
            
            $configration = Configration::where('lang',$lang)->first();
            $menus = MenuItem::where('status',1)->where('parent_id',0)->orderBy('order','ASC')->get();
            $pages = Page::where('status',1)->get();
            $footerServices = Service::where('status',1)->take(6)->get();
            $galleryImages = GalleryImage::where('status',1)->orderBy('order','asc')->get();
            $lang=\App::getLocale();
            
            $addresses = Address::where('status',1)->get();

            App::setlocale($lang);
            View::share('language', $lang);
            View::share('setting', $setting);
            View::share('configration', $configration);
            View::share('menus', $menus);
            View::share('pages', $pages);
            View::share('lang', $lang);
            View::share('footerServices', $footerServices);
            View::share('galleryImages', $galleryImages);
            View::share('addresses', $addresses);
        });
    }
}
