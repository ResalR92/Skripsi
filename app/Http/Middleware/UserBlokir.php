<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class UserBlokir
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
        $response = $next($request);
        if(Auth::check() && Auth::user()->is_blokir){
            Auth::logout();

            Session::flash('flash_error','Maaf, Akun Anda sedang kami BLOKIR');
            Session::flash('penting',true);

            return redirect('/login');
        }
        return $response;
    }
}
