<?php

namespace Pshenichniyinfo\AdminPanel\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticatesAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user() || !auth()->user()->hasAnyRole('super-admin')) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
