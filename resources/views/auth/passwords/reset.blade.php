@extends('app')

@section('title', 'パスワード再設定')

@section('content')
    @include('atoms._simple_nav')
    <div class="max-w-md m-8 md:mx-auto bg-white dark:bg-dark-1 rounded border border-eee dark:border-none">
        <h2 class="text-[#5A5777] dark:text-ddd bg-[#F2F2F2] dark:bg-dark-1 font-semibold text-lg pt-3 px-4 pb-6">
            {{ __('パスワードを再設定') }}
        </h2>
        <form method="POST" action="{{ route('password.update') }}" class="px-6 dark:bg-dark-1">
            @csrf

            {{-- エラー文 --}}
            @include('atoms._error_card_list')

            <div class="w-full mb-3">
                <div class="w-full mb-1 text-xs">新しいパスワード</div>
                <input class="w-full p-2 rounded-[3px] border border-ddd dark:border-dark dark:bg-dark-2" type="password"
                    name="password" required>
            </div>
            <div class="w-full mb-3">
                <div class="w-full mb-1 text-xs">パスワード</div>
                <input class="w-full p-2 rounded-[3px] border border-ddd dark:border-dark dark:bg-dark-2" type="password"
                    name="password_confirmation" required>
            </div>
            <input type="hidden" name="remember" value="on">
            <button type="submit" class="btn-primary px-6 py-4 w-full mb-4">送信</button>
        </form>
    </div>
@endsection
