<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class CheckAdmin
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
        
        if (Gate::denies('view_admin')) {
            abort(403);
        }	
        /*if (! $request->user()->hasRole('admin')) {
            abort(403);
        }*/
        return $next($request);
    }
}
