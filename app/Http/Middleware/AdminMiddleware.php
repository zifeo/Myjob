<?php

namespace Myjob\Http\Middleware;

use Closure;
use Auth, App;

class AdminMiddleware
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

	    if (Auth::guest() || Auth::user()->is_admin != 1) {
			App::abort(404);
		}
	    
        return $next($request);
    }
}
