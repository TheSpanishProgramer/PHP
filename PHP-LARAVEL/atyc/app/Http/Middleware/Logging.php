<?php

namespace App\Http\Middleware;

use Closure;

class Logging
{
    private $start;
    private $end;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->start = microtime(true);

        return $next($request);
    }

    public function terminate($request, $response)
    {
        $this->end = microtime(true);

        $this->log($request);
    }

    protected function log($request)
    {
        $duration = $this->end - $this->start;

        //Le saco el http://*/atyc/public
        $url = substr($request->url(), strpos($request->url(), 'atyc')+12);
        $method = $request->getMethod();
        $ip = $request->getClientIp();
        $user = $request->user();

        $json = array(
            'ip' => $ip,
            'method' => $method,
            'url' => $url,
            'query' => $request->all(),
            'duration' => $duration
        );

        if($user)
        {
            $json['userid'] = $user->id;
            $json['username'] = $user->name;
        }

        logger()->info(json_encode($json));
    }
}
