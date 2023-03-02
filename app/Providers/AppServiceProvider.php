<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
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
        // マイグレーションからSanctumは除外
        \Laravel\Sanctum\Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // テスト環境はhttpsを強制
        if (
            // config('app.app_env') === 'production' ||
            config('app.app_env') === 'staging'
        ) {
            \URL::forceScheme('https');
        }
    }
}
