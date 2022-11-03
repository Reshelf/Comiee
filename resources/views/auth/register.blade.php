@extends('app')

@section('title', '新規登録')

@section('content')
    @include('atoms._simple_nav')
    <div class="max-w-md mx-4 mt-8 md:mx-auto bg-white rounded shadow">
        <h2 class="text-[#5A5777] dark:text-ddd bg-[#F2F2F2] dark:bg-dark-1 font-semibold text-lg py-3 px-4 mb-6">
            {{ __('新規登録') }}
        </h2>

        <form method="POST" action="{{ route('register') }}" class="px-6 dark:bg-dark-1">
            @csrf

            {{-- エラー文 --}}
            @include('atoms._error_card_list')

            <div class="w-full mb-3">
                <div class="w-full mb-1 text-xs">メールアドレス</div>
                <input class="w-full p-2 rounded-[3px] border border-ddd dark:border-dark dark:bg-dark-2" type="email"
                    name="email" required>
            </div>
            <div class="w-full mb-3">
                <div class="w-full mb-1 text-xs">パスワード</div>
                <input class="w-full p-2 rounded-[3px] border border-ddd dark:border-dark dark:bg-dark-2" type="password"
                    name="password" required>
            </div>
            {{-- <div class="w-full mb-3">
                <div class="w-full mb-1 text-xs">パスワード確認</div>
                <input class="w-full p-2 rounded-[3px] border border-ddd dark:border-dark dark:bg-dark-2" type="password"
                    name="password_confirmation" required>
            </div> --}}
            <button class="btn-primary register-btn bg-primary text-white font-semibold rounded px-6 py-4 w-full mb-4"
                type="submit">メールアドレスで登録</button>
        </form>
        <a href="/login" class="w-full text-right text-xs cursor-pointer inline-block pb-4 px-6">またはログイン</a>
    </div>
@endsection
