<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Language
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
        $language = $request->get('lang');
        if ($language && $language == 'en') {
            Session::put('language', 'en');
            config(['app.locale' => 'en']);
        }
        if ($language && $language == 'vi') {
            Session::put('language', 'vi');
            config(['app.locale' => 'vi']);
        }
        return $next($request);
    }
}
