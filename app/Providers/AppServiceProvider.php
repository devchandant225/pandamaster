<?php

namespace App\Providers;

use App\Models\User;
use App\Models\MetaTag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('users')) {
            $admin = User::where('role', 'admin')->first();
            View::share('adminSettings', $admin);
        }

        // Share meta tags across all views
        if (Schema::hasTable('meta_tags')) {
            View::composer('*', function ($view) {
                $currentRoute = request()->route();
                $pageType = null;

                if ($currentRoute) {
                    $routeName = $currentRoute->getName();
                    $pageType = match ($routeName) {
                        'home' => 'home',
                        'about' => 'about',
                        'games.index' => 'games',
                        'games.show' => 'game',
                        'blog.index' => 'blog',
                        'blog.show' => 'post',
                        'dashboard' => 'dashboard',
                        'login' => 'login',
                        'register' => 'register',
                        default => null,
                    };
                }

                $metaTags = null;
                if ($pageType) {
                    $metaTags = MetaTag::where('page_type', $pageType)
                        ->where('is_active', true)
                        ->first();
                }

                $view->with('pageMetaTags', $metaTags);
            });
        }
    }
}
