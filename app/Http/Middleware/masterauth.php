<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class masterauth
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
        $key="cesu7895";
        if (Session::get('masterkey') != $key) {
            return "No access";
            return redirect()->back();
        }

        return $next($request);
    }
}
