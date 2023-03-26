<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\user\NewFollowedUserMail;
use App\Models\User;
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
    public function __invoke(Request $request, string $username)
    {
        $user = User::byUsername($username)->first();

        if ($this->isTryingToFollowSelf($request->user(), $user)) {
            return abort(404, 'Cannot follow yourself.');
        }

        $this->toggleFollow($request->user(), $user);

        if ($user->m_notice_2 === 1) {
            $this->sendNewFollowedUserMailIfOnCooldown($request, $user);
        }

        return ['username' => $username];
    }

    /*
    |--------------------------------------------------------------------------
    | 自分をフォローしようとしていたら
    |--------------------------------------------------------------------------
     */
    private function isTryingToFollowSelf(User $loggedInUser, User $userToFollow): bool
    {
        return $loggedInUser->id === $userToFollow->id;
    }

    /*
    |--------------------------------------------------------------------------
    | フォロー処理
    |--------------------------------------------------------------------------
     */
    private function toggleFollow(User $loggedInUser, User $userToFollow): void
    {
        $loggedInUser->followings()->detach($userToFollow);
        $loggedInUser->followings()->attach($userToFollow);
    }

    /*
    |--------------------------------------------------------------------------
    | フォローされた人にメール送信する
    |--------------------------------------------------------------------------
     */
    private function sendNewFollowedUserMailIfOnCooldown(Request $request, User $userToFollow): void
    {
        $sessionKey = "follow_user_{$request->user()->id}_to_{$userToFollow->id}";
        $emailCooldown = 1440; // 送信間隔を1日に設定
        $now = \Carbon\Carbon::now();
        $lastEmailSentAt = $request->session()->get($sessionKey);

        if (!$lastEmailSentAt || $now->diffInMinutes($lastEmailSentAt) > $emailCooldown) {
            $mailData = [
                'send_user' => $request->user(),
                'received_user' => $userToFollow,
            ];
            Mail::send(new NewFollowedUserMail($mailData));

            $request->session()->put($sessionKey, $now);
        }
    }
}
