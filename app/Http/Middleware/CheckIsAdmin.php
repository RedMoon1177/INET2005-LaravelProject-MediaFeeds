<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $loggedInUser = Auth::user();

        $userRoles = $loggedInUser->roles;

        if ($userRoles->isEmpty()) {
            return redirect(route('home'))->with('status', 'Denied - You do not have permissions to access User Management')->with('is_success', false);
        }

        foreach ($userRoles as $role) {
            if ($role->id == 1) {
                return $next($request);
            }
        }

        return redirect(route('home'))->with('status', 'Denied - You do not have permissions to access User Management')->with('is_success', false);
    }
}
