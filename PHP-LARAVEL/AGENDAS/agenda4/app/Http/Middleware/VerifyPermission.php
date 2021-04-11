<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerifyPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->guest()){
            return $next($request);
        }

        $permissions = DB::table('permissions.permissions_users')
        ->join("permissions.permissions", "permissions.permissions_users.permission_id", "=", "permissions.permissions.id")
        ->where("permissions.permissions_users.user_id", "=", Auth::user()->id)
        ->get();

        if(count($permissions) > 0)
            foreach($permissions as $permission){
                if(strpos("/" . $request->path(), $permission->url) === 0)
                    return response('Unauthorized.', 401);

            }


        return $next($request);
    }
}
