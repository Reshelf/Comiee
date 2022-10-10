@extends('app')

@section('title', '新規登録')

@section('content')
    @include('_patials._simple_nav')
    <div class="max-w-md mx-auto p-8 bg-white dark:bg-dark-1 rounded-lg ">
        <h2 class="text-3xl font-semibold mb-4">Sign up</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            @include('_patials._error_card_list')
            <div class="w-full mb-3">
                <div class="w-full mb-1 text-xs">ニックネーム</div>
                <input class="w-full p-2 rounded-[3px] border border-ccc dark:border-dark dark:bg-dark-2" type="text"
                    name="name" required>
            </div>
            <div class="w-full mb-3">
                <div class="w-full mb-1 text-xs">ユーザーID</div>
                <input class="w-full p-2 rounded-[3px] border border-ccc dark:border-dark dark:bg-dark-2" type="text"
                    name="username" required>
                <small>英数字3〜16文字(登録後の変更はできません)</small>
            </div>
            <div class="w-full mb-3">
                <div class="w-full mb-1 text-xs">メールアドレス</div>
                <input class="w-full p-2 rounded-[3px] border border-ccc dark:border-dark dark:bg-dark-2" type="email"
                    name="email" required>
            </div>
            <div class="w-full mb-3">
                <div class="w-full mb-1 text-xs">パスワード</div>
                <input class="w-full p-2 rounded-[3px] border border-ccc dark:border-dark dark:bg-dark-2" type="password"
                    name="password" required>
            </div>
            <div class="w-full mb-3">
                <div class="w-full mb-1 text-xs">パスワード確認</div>
                <input class="w-full p-2 rounded-[3px] border border-ccc dark:border-dark dark:bg-dark-2" type="password"
                    name="password_confirmation" required>
            </div>
            <button onclick="this.disabled='disabled'; this.form.submit();"
                class="register-btn bg-primary text-white font-semibold rounded px-6 py-4 w-full mb-4"
                type="submit">ユーザー登録</button>
        </form>
        <a href="/login" class="w-full text-right text-xs cursor-pointer">またはログイン</a>
    </div>
@endsection
