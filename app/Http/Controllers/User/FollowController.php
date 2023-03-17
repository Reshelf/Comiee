<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\user\NewFollowedUserMail;
use App\Models\User;
// メール
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | フォローする
    |--------------------------------------------------------------------------
     */
    public function __invoke($lang, Request $request, string $username)
    {
        $user = User::where(['username' => $username])->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        if ($user->m_notice_2 === 1) {
            $sessionKey = "follow_user_{$request->user()->id}_to_{$user->id}";
            $emailCooldown = 1440; // 送信間隔を1日に設定
            $now = \Carbon\Carbon::now();
            $lastEmailSentAt = $request->session()->get($sessionKey);

            // フォローされたらメール通知を送る
            if (!$lastEmailSentAt || $now->diffInMinutes($lastEmailSentAt) > $emailCooldown) {
                $mailData = [
                    'send_user' => $request->user(),
                    'received_user' => $user,
                ];
                Mail::send(new NewFollowedUserMail($mailData));

                // セッションに最後に送信されたメールの日時を保存
                $request->session()->put($sessionKey, $now);
            }
        }

        return ['username' => $username];
    }
}
