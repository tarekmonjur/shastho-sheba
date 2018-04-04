<?php

namespace App\Http\Middleware;

use Closure;

class AccessPermission
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
        $url = $request->segment(1);
        $url2 = $request->segment(2);
        if($url2){
            $url = $url.'/'.$url2;
        }

        if(!canAccess($url)){
            return response()->view('errors.500');
        }
        return $next($request);
    }
}
