<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Daftar route yang dikecualikan dari CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // contoh: 'webhook/*'
    ];
}
