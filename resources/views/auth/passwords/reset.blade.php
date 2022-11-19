@extends('app')

@section('title', 'パスワード再設定')

@section('content')
    @include('atoms._simple_nav')
    <div class="max-w-md m-8 md:mx-auto bg-white dark:bg-dark-1 rounded border border-eee dark:border-none">
        <h2 class="text-[#5A5777] dark:text-ddd bg-[#F2F2F2] dark:bg-dark-1 font-semibold text-lg pt-3 p-4">
            {{ __('パスワードを再設定') }}
        </h2>
        <form method="POST" action="{{ route('password.update') }}" class="px-6 dark:bg-dark-1">
            @csrf

            {{-- エラー文 --}}
            @include('atoms._error_card_list')

            {{-- ないとエラーになる --}}
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="token" value="{{ $token }}">


            <div class="w-full mb-3">
                <input
                    class="w-full text-[15px] px-2 py-3 rounded-[3px] border border-l-0 border-r-0 border-t-0 border-b-ccc dark:border-b-dark dark:bg-dark-2"
                    type="password" name="password" required placeholder="新しいパスワード">
            </div>
            <div class="w-full mb-3">
                <input
                    class="w-full text-[15px] px-2 py-3 rounded-[3px] border border-l-0 border-r-0 border-t-0 border-b-ccc dark:border-b-dark dark:bg-dark-2"
                    type="password" name="password_confirmation" required placeholder="パスワード">
            </div>
            <input type="hidden" name="remember" value="on">
            <button type="submit" class="btn-primary px-6 py-4 w-full mb-4">送信</button>
        </form>
    </div>
@endsection
