<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App;
use View;
use App\Models\Setting;
use App\Models\DashboardMenuItem;
use App\Models\Configration;
use App\Models\MenuItem;
// use App\Models\Product;
use App\Models\Blog;
// use App\Models\Category;

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
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        \URL::forceScheme('https');
        view()->composer('*', function($view)
        {
            $user = auth()->user();
            $setting = Setting::first();
            $lang=\LaravelLocalization::getCurrentLocale();
            if(session()->has('lang'))
            {
              $lang = session()->get('lang');
            }
            $configration = Configration::first();
            $menus = MenuItem::orderBy('order', 'asc')->get();
            $menusDashboard = DashboardMenuItem::where('parent_id', 0)->orderBy('order', 'asc')->get();
            $menuTypes = ['home', 'javascript:;', 'packages', 'deposite', 'st-wallet'];
            $menusDashboard_new = DashboardMenuItem::whereIn('type', $menuTypes)->where('parent_id', 0)->orderBy('order', 'asc')->get();
            // $headerCategories = Category::orderBy('id', 'asc')->limit(6)->get();
            // $footerCategories = Category::orderBy('id', 'asc')->limit(6)->get();
            $blogs = Blog::limit(6)->get();
            App::setlocale($lang);
            View::share('lang', $lang);
            View::share('setting', $setting);
            View::share('configration', $configration);
            View::share('menus', $menus);
            View::share('menusDashboard', $menusDashboard);
            View::share('menusDashboard_new', $menusDashboard_new);
            View::share('blogs', $blogs);
            View::share('user', $user);
            // View::share('headerCategories', $headerCategories);
            // View::share('footerCategories', $footerCategories);

        });
    }
}
