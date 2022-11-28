@extends('app')

@section('title', 'ログイン')

@section('content')
    @include('atoms._simple_nav')
    <div class="max-w-md m-8 md:mx-auto bg-white dark:bg-dark-1 rounded border border-eee dark:border-none">
        <h2 class="text-[#5A5777] dark:text-ddd bg-[#F2F2F2] dark:bg-dark-1 font-semibold text-lg pt-3 p-4">
            {{ __('ログイン') }}
        </h2>
        <form method="POST" action="{{ route('login') }}" class="px-6 dark:bg-dark-1 pt-6">
            @csrf

            {{-- エラー文 --}}
            @include('atoms._error_card_list')
            @include('atoms.success')


            <div class="w-full mb-3">
                <input
                    class="w-full text-[15px] px-2 py-3 rounded-[3px] border border-l-0 border-r-0 border-t-0 border-b-ccc dark:border-b-dark dark:bg-dark-2"
                    type="text" name="email" required placeholder="メールアドレス">
            </div>
            <div class="w-full mb-6">
                <input
                    class="w-full text-[15px] px-2 py-3 rounded-[3px] border border-l-0 border-r-0 border-t-0 border-b-ccc dark:border-b-dark dark:bg-dark-2"
                    type="password" name="password" required placeholder="パスワード">
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
