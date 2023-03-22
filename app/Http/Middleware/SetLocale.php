<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class SetLocale
{
    /*
    |--------------------------------------------------------------------------
    | ロケールの設定
    |--------------------------------------------------------------------------
     */
    public function handle(Request $request, Closure $next)
    {
        // Prefix を判断して言語切替
        $route = Route::getCurrentRoute();
        $lang = $route->parameter('lang', 'en');
        App::setLocale($lang);

        return $next($request);
    }
}
