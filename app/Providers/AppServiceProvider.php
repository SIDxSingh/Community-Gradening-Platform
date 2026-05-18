<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Demonstrating Unit III: View Composers
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $view->with('total_gardens', \App\Models\Garden::count());
        });
    }
}
