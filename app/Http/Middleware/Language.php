<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
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
            App::setLocale('en');
        }
        if ($language && $language == 'vi') {
            Session::put('language', 'vn');
            config(['app.locale' => 'vn']);
            App::setLocale('vn');
        }

        $language = Session::get('language', config('app.locale'));
        config(['app.locale' => $language]);
        return $next($request);
    }
}
