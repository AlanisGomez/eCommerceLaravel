<?php

namespace App\Http\Middleware;

use Closure;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rol)
    {

      if(auth()->user()->rol === 'admin'){
        //return redirect('/admin/indexProductos');
      }

      if(auth()->user()->rol === 'customer'){
        //return redirect('/customer');
      }

        return $next($request);
    }
}
