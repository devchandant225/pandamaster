<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ProfileSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share admin profile data with all views
        View::composer('*', function ($view) {
            $adminProfile = User::where('role', 'admin')->first();
            $view->with('adminProfile', $adminProfile);
        });
    }
}
