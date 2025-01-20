<?php

declare(strict_types=1);

namespace App\Providers;

use App\Support\SystemTweaks;
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
        SystemTweaks::dbCommands();
        SystemTweaks::urls();
        SystemTweaks::date();
        SystemTweaks::models();
        SystemTweaks::resources();
        SystemTweaks::vite();
    }
}
