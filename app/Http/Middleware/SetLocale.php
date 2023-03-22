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
    | アプリケーションのロケール設定
    |--------------------------------------------------------------------------
     */
    public function handle(Request $request, Closure $next)
    {
        // サポートされている言語のリスト
        $supportedLanguages = ['ja', 'en', 'tw', 'cn', 'es', 'fr', 'it', 'id', 'th', 'ko', 'de', 'hi', 'ar', 'pt', 'bn'];

        // Prefix を判断して言語切替
        $route = Route::getCurrentRoute();
        $lang = $route->parameter('lang');

        // クライアントが受け入れる言語の中で、サポートされている言語を選択
        if ($lang === null) {
            $lang = $request->getPreferredLanguage($supportedLanguages) ?? 'en';
        }

        App::setLocale($lang);
        return $next($request);
    }
}
