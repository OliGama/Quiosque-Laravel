<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\UserService;

class Role
{

    public function handle(Request $request, Closure $next, $role)
    {
        $userRole = auth()->user()->role;
        if($userRole !== $role){
            return redirect(UserService::getDashboardRouteBasedOnUserRole($userRole));
        }
        return $next($request);
    }
}
