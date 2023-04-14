<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\SettingLogo;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

use Gloudemans\Shoppingcart\Facades\Cart;


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
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();


        view()->composer('*', function ($view) {

            $navCategories = Category::where('parent_id', 0)->get();
            $view->with('navCategories', $navCategories);
        });

        view()->composer('*', function ($view) {

            $logo = SettingLogo::first();
            $view->with('logo', $logo);
        });

        view()->composer('*', function ($view) {



            $cart_items_count = Cart::count();

            $view->with('cart_items_count', $cart_items_count);
        });

        view()->composer('*', function ($view) {
            $settings = Setting::all();
            View::share('settings', $settings);
        });
    }
}
