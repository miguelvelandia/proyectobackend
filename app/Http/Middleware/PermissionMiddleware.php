<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    public function handle($request, Closure $next, $permission)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        if (!$request->user()->can($permission)) {
            abort(403, 'Usuario no tiene permiso para acceder a esta pagina');
        }

        return $next($request);
    }
}
