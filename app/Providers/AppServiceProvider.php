<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\AppService;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
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
        AppService::tweaksDatetime();
        AppService::tweaksLaraConfig();
        AppService::tweaksVite();
    }
}
