@extends('app')

@section('title', 'パスワード再設定のメール送信を送信')

@section('content')
    @include('atoms._simple_nav')
    <div class="max-w-md m-8 md:mx-auto bg-white dark:bg-dark-1 rounded border border-eee dark:border-none">
        <h2 class="text-[#5A5777] dark:text-ddd bg-[#F2F2F2] dark:bg-dark-1 font-semibold text-lg pt-3 px-4 pb-6">
            {{ __('パスワード再設定メールを送信') }}
        </h2>
        <form method="POST" action="{{ route('password.email') }}" class="px-6 dark:bg-dark-1">
            @csrf

            {{-- エラー文 --}}
            @include('atoms._error_card_list')

            @if (session('status'))
                <div class="text-green bg-green bg-opacity-20 mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <div class="w-full mb-3">
                <div class="w-full mb-1 text-xs">メールアドレス</div>
                <input class="w-full p-2 rounded-[3px] border border-ddd dark:border-dark dark:bg-dark-2" type="text"
                    name="email" required>
            </div>
            <button type="submit" class="btn-primary px-6 py-4 w-full mb-4">メールを送信</button>
        </form>
    </div>
@endsection
