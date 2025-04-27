<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class RedirectBasedOnRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();
            
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'Marchand':
                    return redirect()->route('vendor.dashboard');
                case 'livreur':
                    return redirect()->route('delivery.dashboard');
                default:
                    // For regular users/clients
                    return $next($request);
            }
        }
        
        return $next($request);
    }
}
