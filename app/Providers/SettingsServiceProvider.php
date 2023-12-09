<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Contracts\Settings', function ($app) {
            return new \App\Models\GeneralSettings();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['welcome', 'frontend.contact.index', 'admin.order.show', 
        'frontend.layouts.master_frontend', 'frontend.about.salamat', 'frontend.about.volt-me', 'frontend.dashboard.invoice', 
        'layouts._left-sidebar', 'layouts.guest', 'admin.stock.print-header', 'admin.offline.order-show'], function ($view) {
            $settings = \App\Models\GeneralSettings::all();
            $view->with('siteSettings', $settings);
        });
    }
}
