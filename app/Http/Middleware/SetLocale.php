<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class SetLocale
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
        $lang = 'rs';
        if(isset($request->lang)){
            $lang = $request->lang;
        }
        \Illuminate\Support\Facades\App::setLocale($lang);

        return $next($request);
    }
}
