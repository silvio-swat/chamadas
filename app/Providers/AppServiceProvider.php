<?php

namespace App\Providers;

use App\Models\MenuPage;
use App\Observers\MenuPageObserver;
use Illuminate\Support\ServiceProvider;

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
        MenuPage::observe(MenuPageObserver::class);
    }
}
