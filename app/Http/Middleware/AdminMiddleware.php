<?php

namespace CodizerTienda\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
        /**
         * Verifica que el usuario logueado sea de tipo administrador
         * Si es así que deje pasar la petición
         */
        if( Auth::user()->type == 'admin' ) {
            return $next($request);
        }

        /**
         * Sino que lo saque del sistema y cierre sesión actual
         */
        Auth::logout();
        return Redirect::back();
    }
}
