@csrf

{{-- カバー画像 --}}
<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('カバー画像') }}</h3>
<div class="mb-8">
    <p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
        {{ __('投稿できる画像形式はpng,jpg(jpeg),gif, webpです。') }}
    </p>
    <p class="mb-4 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
        {{ __('横幅1152px, 縦幅300pxの画像サイズが最も綺麗に表示されます。') }}
    </p>
    <input type="file" name="thumbnail" />
</div>

{{-- プロフィール画像 --}}
<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('プロフィール画像') }}</h3>
<div class="mb-8">
    <p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
        {{ __('投稿できる画像形式はpng,jpg(jpeg),gif, webpです。') }}
    </p>
    <p class="mb-4 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
        {{ __('横幅200px, 縦幅200pxの画像サイズが最も綺麗に表示されます。') }}
    </p>
    <input type="file" name="avatar" />
</div>

{{-- 名前 --}}
<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('名前') }}</h3>
<div class="mb-8">
    <input type="text" name="name" value="{{ $user->name ?? old('name') }}"
        class="w-full p-2 border-b dark:border-none border-ccc dark:bg-dark-2 rounded" maxlength="30">
</div>

{{-- ユーザーID --}}
<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('ユーザーID') }}</h3>
<div class="mb-8">
    <input type="text" name="username" value="{{ $user->username ?? old('username') }}"
        class="w-full p-2 border-b dark:border-none border-ccc dark:bg-dark rounded" maxlength="20" minlength="4">
</div>

{{-- メールアドレス --}}
<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('メールアドレス') }}</h3>
<div class="mb-8">
    <input type="email" name="email" value="{{ $user->email ?? old('email') }}"
        class="w-full p-2 border-b dark:border-none border-ccc dark:bg-dark rounded" maxlength="255">
</div>


{{-- <div class="flex w-full mb-8">
        <div class="w-1/4 font-semibold mb-2">リンク</div>
        <div class="w-3/4 pl-4">
            <input type="text" name="website" value="{{ $user->website ?? old('website') }}"
                class="w-full p-2 bg-white-1 dark:bg-dark-2 rounded">
        </div>
    </div> --}}

{{-- 自己紹介 --}}
<h3 class="tracking-widest mb-4 text-[15px] font-semibold">{{ __('自己紹介') }}</h3>
<div class="mb-8">
    <textarea name="body" placeholder="{{ __('200文字以内で入力してください。') }}" maxlength="200"
        class="w-full dark:bg-dark p-4 border dark:border-none border-ddd rounded h-44">{{ $user->body ?? old('body') }}</textarea>
</div>
