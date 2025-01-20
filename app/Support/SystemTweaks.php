<?php

declare(strict_types=1);

namespace App\Support;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;

final class SystemTweaks
{
    public static function models(): void
    {
        Model::unguard();
        Model::shouldBeStrict();
    }

    public static function resources(): void
    {
        JsonResource::withoutWrapping();
    }

    public static function dbCommands(): void
    {
        DB::prohibitDestructiveCommands(app()->isProduction());
    }

    public static function date(): void
    {
        Carbon::macro('toStringDate', function () {
            return $this->format('Y-m-d'); // @phpstan-ignore variable.undefined, method.nonObject
        });
        Carbon::macro('toStringTime', function () {
            return $this->format('h:i A'); // @phpstan-ignore variable.undefined, method.nonObject
        });
        Carbon::macro('toStringDatetime', function () {
            return $this->format('Y-m-d h:i A'); // @phpstan-ignore variable.undefined, method.nonObject
        });

        // CarbonImmutable as default
        Date::use(CarbonImmutable::class);
    }

    public static function vite(): void
    {
        Vite::prefetch(concurrency: 3);
    }

    public static function urls(): void
    {
        URL::forceScheme('https');
    }
}
