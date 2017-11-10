<?php

namespace App\Providers;

use App\MainCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $lang = 'rs';
        $mainCategories = MainCategories::where('active', 1)->get();
        $adminUrl = Config::get('my.adminUrl');

        view()->share('mainCategories', $mainCategories);
        view()->share('adminUrl', $adminUrl);
        view()->share('lang', $lang);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
