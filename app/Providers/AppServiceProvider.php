<?php

namespace App\Providers;

use App\Models\User;
use App\Models\MetaTag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\URL;

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
    if (app()->environment('production')) {
        URL::forceScheme('https');
    }

    if (Schema::hasTable('users')) {
        $admin = User::where('role', 'admin')->first();
        View::share('adminSettings', $admin);
    }

    if (Schema::hasTable('games')) {
        View::share('headerGames', \App\Models\Game::where('is_active', true)->limit(10)->get());
    }
}
}
