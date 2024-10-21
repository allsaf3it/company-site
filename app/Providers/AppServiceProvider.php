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
use App\About;
use App\Service;
use App\GalleryImage;
use App\Address;
use App\SeoAssistant;
use App\Writer;
use App\Project;
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
            $seo = SeoAssistant::first();
            $lang=\LaravelLocalization::getCurrentLocale();
            $writers = Writer::where('status',1)->get();
            if(session()->has('lang'))
            {
              $lang = session()->get('lang');
            }
            $menuProjects = Project::where('parent_id', 0)->where('status',1)->get();
            $about = About::first();
            $configration = Configration::where('lang',$lang)->first();
            $menus = MenuItem::where('menu_id',1)->where('status',1)->where('parent_id',0)->orderBy('order','ASC')->get();
            $footerMenus = MenuItem::where('status',1)->where('parent_id',0)->orderBy('order','ASC')->get();
            $pages = Page::where('status',1)->get();
            $footerServices = Service::where('status',1)->take(6)->get();
            $menuServices = Service::where('status',1)->where('parent_id', 0)->orderBy('order')->where('menu',1)->get();
            $galleryImages = GalleryImage::where('status',1)->orderBy('order','asc')->get();
            $lang=\LaravelLocalization::getCurrentLocale();
            $addresses = Address::where('status',1)->orderBy('id', 'desc')->get();

            App::setlocale($lang);
            View::share('language', $lang);
            View::share('setting', $setting);
            View::share('configration', $configration);
            View::share('menuProjects', $menuProjects);
            View::share('about', $about);
            View::share('menus', $menus);
            View::share('pages', $pages);
            View::share('lang', $lang);
            View::share('footerServices', $footerServices);
            View::share('menuServices', $menuServices);
            View::share('galleryImages', $galleryImages);
            View::share('addresses', $addresses);
            View::share('writers', $writers);
            View::share('seo', $seo);
            View::share('footerMenus', $footerMenus);
            
        });
    }
}
