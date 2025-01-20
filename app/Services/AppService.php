<?php

declare(strict_types=1);

namespace App\Services;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Vite;

final class AppService
{
    public static function tweaksLaraConfig(): void
    {
        Model::unguard();
        Model::shouldBeStrict();

        JsonResource::withoutWrapping();

        DB::prohibitDestructiveCommands(app()->isProduction());
    }

    public static function tweaksDatetime(): void
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

    public static function tweaksVite(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
