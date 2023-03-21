<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
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

        // 設定
        for ($i = 1; $i <= 6; $i++) {
            $user->{"m_notice_$i"} = $request->input("m$i") === null;
        }

        // メール更新の場合は確認メール
        $oldEmail = $user->email;
        $newEmail = $request->email;
        if ($oldEmail !== $newEmail) {
            $user->email = $newEmail;
            $user->email_verified_at = null;
            $user->save();

            event(new Registered($user));

            return back()->with('resent', true)->withSuccess(__("メールアドレスが更新されました！確認メールをお送りしましたので、ご確認ください。"));
        }

        $user->save();

        // 新しいユーザーIDのページへ遷移
        return redirect('/' . app()->getLocale() . '/' . $user->username)->withSuccess("プロフィールを更新しました！");
    }
}
