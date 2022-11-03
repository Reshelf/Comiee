@extends('app')

@section('title', 'ログイン')

@section('content')
    @include('atoms._simple_nav')
    <div class="max-w-md mx-auto bg-white dark:bg-dark-1 rounded border border-eee">
        <h2 class="text-[#5A5777] dark:text-ddd bg-[#F2F2F2] dark:bg-dark-1 font-semibold text-lg py-3 px-4 mb-6">
            {{ __('ログイン') }}
        </h2>
        <form method="POST" action="{{ route('login') }}" class="px-6 dark:bg-dark-1">
            @csrf

            {{-- エラー文 --}}
            @include('atoms._error_card_list')

            <div class="w-full mb-3">
                <div class="w-full mb-1 text-xs">メールアドレス</div>
                <input class="w-full p-2 rounded-[3px] border border-ddd dark:border-dark dark:bg-dark-2" type="text"
                    name="email" required>
            </div>
            <div class="w-full mb-3">
                <div class="w-full mb-1 text-xs">パスワード</div>
                <input class="w-full p-2 rounded-[3px] border border-ddd dark:border-dark dark:bg-dark-2" type="password"
                    name="password" required>
            </div>
            <input type="hidden" name="remember" value="on">
            <button type="submit" class="btn-primary px-6 py-4 w-full mb-4">ログイン</button>
        </form>
        <div class="w-full flex justify-between pb-4 px-6">
            <a href="{{ route('password.request') }}" class="cursor-pointer text-xs">パスワードを忘れた方</a>
            <a href="/register" class="text-xs cursor-pointer">または新規登録</a>
        </div>
    </div>
@endsection
