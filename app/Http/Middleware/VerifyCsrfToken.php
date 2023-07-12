<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/images/store',
        '/api/auth/login',
        '/api/auth/register',
        '/api/auth/user/update',
        '/api/auth/forget-password',
        '/api/auth/reset-password',
        '/api/checkout/payment'
    ];
}
