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
        URL::forceScheme('https');

        if (Schema::hasTable('users')) {
            $admin = User::where('role', 'admin')->first();
            View::share('adminSettings', $admin);
        }

        View::share('gameTypes', [
            ['slug' => 'slots', 'label' => 'Slots', 'icon' => '🎰'],
            ['slug' => 'fish', 'label' => 'Fish Games', 'icon' => '🐟'],
            ['slug' => 'table', 'label' => 'Table Games', 'icon' => '🎯'],
            ['slug' => 'keno', 'label' => 'Online Keno', 'icon' => '🎲'],
            ['slug' => 'card', 'label' => 'Card Games', 'icon' => '🃏'],
        ]);
    }
}
