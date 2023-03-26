<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SetLocale
{
    /*
    |--------------------------------------------------------------------------
    | アプリケーションのロケール設定
    |--------------------------------------------------------------------------
     */
    public function handle(Request $request, Closure $next)
    {
        $supportedLanguages = ['ja', 'en', 'tw', 'cn', 'es', 'fr', 'it', 'id', 'th', 'ko', 'de', 'hi', 'ar', 'pt', 'bn'];

        // ユーザーがログインしている場合はユーザーの言語設定を使用
        if (Auth::check()) {
            $lang = Auth::user()->lang;
        } else {
            // クライアントが受け入れる言語の中で、サポートされている言語を選択
            $lang = $request->getPreferredLanguage($supportedLanguages) ?? 'en';
        }

        App::setLocale($lang);
        return $next($request);
    }
}
