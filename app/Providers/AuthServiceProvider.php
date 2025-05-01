<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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
        Gate::define('view-activity-upload', function ($user) {
            return $user->hasAnyRole(['Member', 'Manager']);
        });

        Gate::define('view-activity-verification', function ($user) {
            return $user->hasAnyRole(['Super admin', 'Manager']);
        });
    }
}
