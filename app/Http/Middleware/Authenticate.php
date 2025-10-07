<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        // Kalau user belum login, arahkan ke halaman login
        if (! $request->expectsJson()) {
             session()->flash('error', 'Silahkan Login Terlebih dahulu!');
            return route('login');
        }

        return null;
    }
}
