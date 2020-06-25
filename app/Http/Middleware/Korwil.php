<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Korwil
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
        if ($role_id == 1) {
            return $next($request);
        }else {
            return redirect('survey');
        }
    }
}
