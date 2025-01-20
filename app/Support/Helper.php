<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Auth\AuthenticationException;

if (! function_exists('authUser')) {
    function authUser(): User
    {
        $user = auth()->user();

        throw_if($user === null, AuthenticationException::class, 'Unauthenticated.');

        return $user;
    }
}
