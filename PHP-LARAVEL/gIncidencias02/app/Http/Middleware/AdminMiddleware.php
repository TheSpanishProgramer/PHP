<?php

namespace App\Http\Middleware;

use Closure;

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
        if(!auth()->check()) // Si el usuario no esta loggeado, lo redirecciona a login
            return redirect('login');

        if(auth()->user()->role != 0) // Si el usuario loggeado no es Admin, se redireccion a home
            return redirect('home');

        return $next($request);
    }
}
