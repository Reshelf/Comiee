<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
// use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    /*
    |--------------------------------------------------------------------------
    | 作品の更新
    |--------------------------------------------------------------------------
     */
    public function __invoke(Request $request, User $user)
    {
        $user = Auth::user();

        $request->validate(
            [
                'name' => ['nullable', 'string', 'max:30'],
                'username' => 'required|string|min:4|max:25|regex:/\A([a-zA-Z0-9-_])+\z/u|unique:users,username,' . $user->id . ',id',
                'email' => 'required|email:filter,dns|unique:users,email,' . $user->id . ',id',
                'body' => ['nullable', 'string', 'max:200'],
                'gender' => ['nullable', 'string', 'max:50'],
                'website' => ['nullable', 'string'],
                'twitter' => ['nullable', 'string'],
                'youtube' => ['nullable', 'string'],
                'instagram' => ['nullable', 'string'],
                'birth' => ['nullable', 'date'],
                'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:30720'],
                'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:30720'],
            ],
            [
                'avatar.mimes:jpeg,png,jpg,gif,webp' => '保存できる画像形式はpng, jpg(jpeg), gif, webpです',
                'thumbnail.mimes:jpeg,png,jpg,gif,webp' => '保存できる画像形式はpng, jpg(jpeg), gif, webpです',
            ]
        );

        $user->name = $request->name;
        $user->username = $request->username;
        $user->body = $request->body;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->birth = $request->input('birth');

        $user->website = $request->website;
        $user->twitter = $request->twitter;
        $user->youtube = $request->youtube;
        $user->instagram = $request->instagram;

        if ($request->has('avatar')) {
            // 画像加工
            $file = $request->file('avatar');
            $img = \Image::make($file);
            $img->resize(
                3000,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            )->limitColors(null)->encode('webp', 0.01); // 多分最大は0.1

            // 保存
            $filePath = 'app/' . env('APP_ENV') . '/users/' . $user->username . '/avatar.webp';
            Storage::disk('r2')->put($filePath, $img);
            $user->avatar = env('CLOUDFLARE_R2_URL') . '/' . $filePath;
        }

        if ($request->has('thumbnail')) {
            // 画像加工
            $file = $request->file('thumbnail');
            $img = \Image::make($file);
            $img->resize(
                3000,
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                }
            )->limitColors(null)->encode('webp', 0.01); // 多分最大は0.1

            // 保存
            $filePath = 'app/' . env('APP_ENV') . '/users/' . $user->username . '/thumbnail.webp';
            Storage::disk('r2')->put($filePath, $img);
            $user->thumbnail = env('CLOUDFLARE_R2_URL') . '/' . $filePath;
        }

        $user->m_notice_1 = false;
        $user->m_notice_2 = false;
        $user->m_notice_3 = false;
        $user->m_notice_4 = false;
        $user->m_notice_5 = false;
        $user->m_notice_6 = false;
        if ($request->input('m1') === null) {
            $user->m_notice_1 = true;
        }

        if ($request->input('m2') === null) {
            $user->m_notice_2 = true;
        }

        if ($request->input('m3') === null) {
            $user->m_notice_3 = true;
        }

        if ($request->input('m4') === null) {
            $user->m_notice_4 = true;
        }

        if ($request->input('m5') === null) {
            $user->m_notice_5 = true;
        }

        if ($request->input('m6') === null) {
            $user->m_notice_6 = true;
        }

        $user->save();

        // 新しいユーザーIDのページへ遷移
        return redirect('/' . app()->getLocale() . '/' . $user->username)->withSuccess("プロフィールを更新しました！");
    }
}
