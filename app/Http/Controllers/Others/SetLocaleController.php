<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetLocaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }
    /*
    |--------------------------------------------------------------------------
    | 言語切替 & DBに保存
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request)
    {
        $lang = $request->lang;
        // 言語設定を変更し、データベースに保存
        \App::setLocale($lang);
        $user = Auth::user();
        $user->lang = $lang;
        $user->save();

        // 設定ページにリダイレクト
        return redirect('/' . Auth::user()->username . '/settings');

    }
}
