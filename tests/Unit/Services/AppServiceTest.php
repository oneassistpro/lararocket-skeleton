<?php

declare(strict_types=1);

use App\Services\AppService;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;

test('ensures tweaksDatetime adds macros and sets CarbonImmutable as default', function () {
    AppService::tweaksDatetime();

    $date = Date::parse('2025-01-01 12:00 PM');
    expect($date->toStringDate())
        ->toBe('2025-01-01')
        ->and($date->toStringTime())->toBe('12:00 PM')
        ->and($date->toStringDatetime())->toBe('2025-01-01 12:00 PM')
        ->and(Date::now())->toBeInstanceOf(CarbonImmutable::class);
});
