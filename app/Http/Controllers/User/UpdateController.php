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
            // 'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
            // 'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->body = $request->body;
        $user->email = $request->email;
        // $user->website = $request->website;

        if ($request->has('avatar')) {
            $avatar =  \Image::make($request->file('avatar'));
            $avatar->resize(
                800,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            )->limitColors(null)->encode('webp', 0.01)->stream('webp');

            Storage::disk('s3')->put('app/users/avatar/' . $request->file('avatar')->getClientOriginalName(), $avatar);
            $user->avatar = Storage::disk('s3')->url('app/users/avatar/' . $request->file('avatar')->getClientOriginalName());
        }

        if ($request->has('thumbnail')) {
            $thumbnail =  \Image::make($request->file('thumbnail'));
            $thumbnail->resize(
                2000,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            )->limitColors(null)->encode('webp', 0.01)->stream('webp'); // 多分最大は0.1

            Storage::disk('s3')->put('app/users/thumbnail/' . $request->file('thumbnail')->getClientOriginalName(), $thumbnail);
            $user->thumbnail = Storage::disk('s3')->url('app/users/thumbnail/' . $request->file('thumbnail')->getClientOriginalName());
        }

        $user->m_notice_1 = false;
        $user->m_notice_2 = false;
        $user->m_notice_3 = false;
        $user->m_notice_4 = false;
        $user->m_notice_5 = false;
        $user->m_notice_6 = false;
        $m1 = $request->input('m1');
        $m2 = $request->input('m2');
        $m3 = $request->input('m3');
        $m4 = $request->input('m4');
        $m5 = $request->input('m5');
        $m6 = $request->input('m6');
        if ($m1 === 'm1') $user->m_notice_1 = true;
        if ($m2 === 'm2') $user->m_notice_2 = true;
        if ($m3 === 'm3') $user->m_notice_3 = true;
        if ($m4 === 'm4') $user->m_notice_4 = true;
        if ($m5 === 'm5') $user->m_notice_5 = true;
        if ($m6 === 'm6') $user->m_notice_6 = true;

        $user->save();

        // 新しいユーザーIDのページへ遷移
        return redirect('/' . $user->username)->withSuccess("プロフィールを更新しました！");
    }
}
