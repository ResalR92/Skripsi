<?php

namespace App\Http\Middleware;

use Closure;
use App\Role;

class RedirectIfNotOperator
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
        if(!(Role::all()->whereIn('name',['admin','operator']))){
            return redirect('/');
        }
        return $next($request);
    }
}
