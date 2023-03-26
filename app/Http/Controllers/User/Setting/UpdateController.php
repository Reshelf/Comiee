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
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | 設定の更新
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request, User $user)
    {
        $user = Auth::user();

        for ($i = 1; $i <= 6; $i++) {
            $m = $request->input("m{$i}");
            $user->{"m_notice_{$i}"} = ($m === "m{$i}");
        }

        $user->save();

        // 新しいユーザーIDのページへ遷移
        return back()->withSuccess(__("設定を更新しました。"));
    }
}
