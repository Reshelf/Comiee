@csrf
<div class="flex flex-col text-sm">
    <div class="flex w-full mb-12">
        <div class="w-1/4 font-semibold mb-2">カバー画像</div>
        <div class="w-3/4 pl-4 flex flex-col items-center">
            @include('users.atoms.form.thumbnail')
        </div>
    </div>

    <div class="flex w-full mb-12">
        <div class="w-1/4 font-semibold mb-2">プロフィール画像</div>
        <div class="w-3/4 pl-4 flex flex-col items-center">
            @include('users.atoms.form.avatar')
        </div>
    </div>

    <div class="flex w-full mb-8">
        <div class="w-1/4 font-semibold mb-2">名前</div>
        <div class="w-3/4 pl-4">
            <input type="text" name="name" value="{{ $user->name ?? old('name') }}"
                class="w-full p-2 border-b border-ccc dark:bg-dark-2 rounded" maxlength="30">
        </div>
    </div>

    <div class="flex w-full mb-8">
        <div class="w-1/4 font-semibold mb-2">ユーザーID</div>
        <div class="w-3/4 pl-4">
            <input type="text" name="username" value="{{ $user->username ?? old('username') }}"
                class="w-full p-2 border-b border-ccc dark:bg-dark rounded" maxlength="20" minlength="4">
        </div>
    </div>

    <div class="flex w-full mb-8">
        <div class="w-1/4 font-semibold mb-2">メールアドレス</div>
        <div class="w-3/4 pl-4">
            <input type="email" name="email" value="{{ $user->email ?? old('email') }}"
                class="w-full p-2 border-b border-ccc dark:bg-dark rounded" maxlength="255">
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
                class="w-full p-4 border border-ddd rounded h-44">{{ $user->body ?? old('body') }}</textarea>
        </div>
    </div>
    {{-- <user-body-count :content='@json($user->body ?? old('body'))'></user-body-count> --}}
</div>
