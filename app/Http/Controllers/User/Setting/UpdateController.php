<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | 設定の更新
    |--------------------------------------------------------------------------
    */
    public function __invoke(Request $request, User $user)
    {
        $user = Auth::user();

        $m1 = $request->input('m1');
        $m2 = $request->input('m2');
        $m3 = $request->input('m3');
        $m4 = $request->input('m4');
        $m5 = $request->input('m5');
        $m6 = $request->input('m6');

        $user->m_notice_1 = false;
        $user->m_notice_2 = false;
        $user->m_notice_3 = false;
        $user->m_notice_4 = false;
        $user->m_notice_5 = false;
        $user->m_notice_6 = false;
        if ($m1 === 'm1') $user->m_notice_1 = true;
        if ($m2 === 'm2') $user->m_notice_2 = true;
        if ($m3 === 'm3') $user->m_notice_3 = true;
        if ($m4 === 'm4') $user->m_notice_4 = true;
        if ($m5 === 'm5') $user->m_notice_5 = true;
        if ($m6 === 'm6') $user->m_notice_6 = true;

        $user->save();

        // 新しいユーザーIDのページへ遷移
        return redirect('/' . $user->username . '/settings')->withSuccess("設定を更新しました！");
    }
}
