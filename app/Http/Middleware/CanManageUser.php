<?php

namespace App\Http\Middleware;

use Closure;

class CanManageUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()->can([
            'create-users',
            'update-users',
            'delete-users',
            'read-users'
        ])) {
             return response()->json(['error' => 'Доступ заборонено'], 403);
        }
        return $next($request);
    }
}
