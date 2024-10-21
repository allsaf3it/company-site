<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPackage
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
        $user = Auth::user();

        if ($user && $user->plan_id != null) {
            return $next($request);
        }

        // Redirect to an unauthorized page or perform alternative logic
        return redirect()->route('dashboard.home'); // Replace with your actual route or URI
    }
}