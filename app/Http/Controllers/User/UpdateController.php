<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
// use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 作品の更新
     * ポリシー(src/app/Policies/BookPolicy.php)
     */
    public function __invoke(Request $request, User $user)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['nullable', 'string', 'max:30'],
            'username' => 'required|string|min:4|max:20|regex:/\A([a-zA-Z0-9-_])+\z/u|unique:users,username,' . $user->id . ',id',
            'email' => 'required|email:filter,dns|unique:users,email,' . $user->id . ',id',
            'body' => ['nullable', 'string', 'max:200'],
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->body = $request->body;
        $user->email = $request->email;
        // $user->website = $request->website;

        if ($request->has('avatar')) {
            $path = Storage::disk('s3')->put('/app/users/avatar', $request->file('avatar'));
            $user->avatar = Storage::disk('s3')->url($path);
        }

        if ($request->has('thumbnail')) {
            $path = Storage::disk('s3')->put('/app/users/thumbnail', $request->file('thumbnail'));
            $user->thumbnail = Storage::disk('s3')->url($path);
        }

        $m1 = $request->input('m1');
        $m2 = $request->input('m2');
        $m3 = $request->input('m3');
        $m4 = $request->input('m4');
        $m5 = $request->input('m5');
        $m6 = $request->input('m6');

        if ($m1 != null) {
            if ($m1 === 'm1') {
                $user->m_notice_1 = true;
            }
        } else {
            $user->m_notice_1 = false;
        }
        if ($m2 != null) {
            if ($m2 === 'm2') {
                $user->m_notice_2 = true;
            }
        } else {
            $user->m_notice_2 = false;
        }
        if ($m3 != null) {
            if ($m3 === 'm3') {
                $user->m_notice_3 = true;
            }
        } else {
            $user->m_notice_3 = false;
        }
        if ($m4 != null) {
            if ($m4 === 'm4') {
                $user->m_notice_4 = true;
            }
        } else {
            $user->m_notice_4 = false;
        }
        if ($m5 != null) {
            if ($m5 === 'm5') {
                $user->m_notice_5 = true;
            }
        } else {
            $user->m_notice_5 = false;
        }
        if ($m6 != null) {
            if ($m6 === 'm6') {
                $user->m_notice_6 = true;
            }
        } else {
            $user->m_notice_6 = false;
        }

        $user->save();

        // 新しいユーザーIDのページへ遷移
        return redirect('/' . $user->username);
    }
}
