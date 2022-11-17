@extends('app')

@section('title', 'パスワード再設定のメール送信を送信')

@section('content')
    @include('atoms._simple_nav')
    <div class="max-w-md m-8 md:mx-auto bg-white dark:bg-dark-1 rounded border border-eee dark:border-none">
        <h2 class="text-[#5A5777] dark:text-ddd bg-[#F2F2F2] dark:bg-dark-1 font-semibold text-lg pt-3 p-4 mb-6">
            {{ __('パスワード再設定のメールを送信') }}
        </h2>
        <form method="POST" action="{{ route('password.email') }}" class="px-6 dark:bg-dark-1">
            @csrf

            {{-- エラー文 --}}
            @include('atoms._error_card_list')

            @if (session('status'))
                <div class="text-green font-semibold bg-green bg-opacity-10 p-4 mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <div class="w-full mb-4">
                <input
                    class="w-full text-[15px] px-2 py-3 rounded-[3px] border border-l-0 border-r-0 border-t-0 border-b-ccc dark:border-b-dark dark:bg-dark-2"
                    type="text" name="email" required placeholder="メールアドレス">
            </div>
            <button type="submit" class="btn-primary px-6 py-4 w-full mb-4">パスワードリセットリンクを送信</button>
        </form>
    </div>
@endsection
