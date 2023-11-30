<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\AuthUser as Middleware;
use Illuminate\Http\Request;

class AuthUser extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
       
        return $request->expectsJson() ? null : route('client.edit');
    }
}

