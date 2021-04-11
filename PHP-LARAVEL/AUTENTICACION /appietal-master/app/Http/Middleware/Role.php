<?php
namespace AppIetal\Http\Middleware;

use Closure;

class Role
{
    protected $hierarchy=
    [// jerarquia para darle permisos a los usaurios dependiendo de su rol en el sistema
        'admin' =>  4,
        'estudiante'=> 3
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $tipo)
    {
        $user = auth()->user();
        if ($this->hierarchy[$user->tipo] < $this->hierarchy[$tipo])//segun el role que tenga en el usuario me va devolver un valor numerico inicializado en el array.
        {
            abort(404);
        }

        return $next($request);
    }
}
