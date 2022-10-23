@csrf
<div class="flex flex-col text-sm">
    <div class="flex w-full mb-12">
        <div class="w-1/4 font-semibold mb-2">カバー画像</div>
        <div class="w-3/4 pl-4 flex flex-col items-center">
            @empty($user->thumbnail)
                <img src="{{ asset('/img/bg.svg') }}" alt="" class="block dark:hidden rounded max-h-6">
                <img src="{{ asset('/img/bg-dark.svg') }}" alt="thumbnail" class="hidden dark:block rounded max-h-6">
            @else
                <img class="profile-img" src="{{ asset('/img/users/thumbnail/' . Auth::user()->thumbnail) }}"
                    alt="profile_thumbnail" class="rounded max-h-6 flex">
            @endempty
            <input type="file" name="thumbnail" class="my-2 dark:text-gray">
        </div>
    </div>

    <div class="flex w-full mb-12">
        <div class="w-1/4 font-semibold mb-2">プロフィール画像</div>
        <div class="w-3/4 pl-4 flex flex-col items-center">
            @empty($user->avatar)
                <img src="{{ asset('/img/noimage-user.svg') }}" alt="" class="avatar">
            @else
                <img src="{{ asset('/img/users/avatar/' . Auth::user()->avatar) }}" alt="avatar" class="avatar">
            @endempty
            <input type="file" name="avatar" class="my-2 dark:text-gray">
        </div>
    </div>

    <div class="flex w-full mb-8">
        <div class="w-1/4 font-semibold mb-2">ニックネーム</div>
        <div class="w-3/4 pl-4">
            <input type="text" name="name" value="{{ $user->name ?? old('name') }}"
                class="w-full p-2 bg-white-1 dark:bg-dark-2 rounded">
        </div>
    </div>

    <div class="flex w-full mb-8">
        <div class="w-1/4 font-semibold mb-2">名前</div>
        <div class="w-3/4 pl-4">
            <input disabled type="text" name="name" value="{{ $user->username ?? old('username') }}"
                class="w-full p-2 bg-gray-2 dark:bg-dark rounded">
        </div>
    </div>

    <div class="flex w-full mb-8">
        <div class="w-1/4 font-semibold mb-2">メールアドレス</div>
        <div class="w-3/4 pl-4">
            <input disabled type="email" name="email" value="{{ $user->email ?? old('email') }}"
                class="w-full p-2 bg-gray-2 dark:bg-dark rounded">
        </div>
    </div>

    {{-- <div class="flex w-full mb-8">
        <div class="w-1/4 font-semibold mb-2">リンク</div>
        <div class="w-3/4 pl-4">
            <input type="text" name="website" value="{{ $user->website ?? old('website') }}"
                class="w-full p-2 bg-white-1 dark:bg-dark-2 rounded">
        </div>
    </div> --}}

    <div class="flex w-full mb-4">
        <div class="w-1/4 font-semibold mb-2">自己紹介</div>
        <div class="w-3/4 pl-4">
            <textarea name="body" placeholder="200文字以内で入力してください。" maxlength="200"
                class="w-full p-2 bg-white-1 dark:bg-dark-2 rounded h-40">{{ $user->body ?? old('body') }}</textarea>
        </div>
    </div>
    {{-- <user-body-count :content='@json($user->body ?? old('body'))'></user-body-count> --}}
</div>
