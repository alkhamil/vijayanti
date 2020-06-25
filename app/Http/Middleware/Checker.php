<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Checker
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
        $role_id = Auth::user()->role_id;
        if ($role_id == 2) {
            return $next($request);
        }else {
            return redirect('forbid-checker');
        }
    }
}
