<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Sinnbeck\Markdom\Facades\Markdom;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Markdom::registerBladeDirectives();
    }
}
