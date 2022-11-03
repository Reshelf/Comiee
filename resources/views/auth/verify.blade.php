@extends('app')

@section('content')
    @include('atoms._simple_nav')

    <div class="max-w-lg mx-4 mt-8 md:mx-auto bg-white rounded shadow">
        <h2 class="text-[#5A5777] dark:text-ddd bg-[#F2F2F2] dark:bg-dark-1 font-semibold text-lg py-3 px-4">
            {{ __('認証メールを送信しました') }}
        </h2>

        <div class="p-6 dark:bg-dark-1">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('ご登録いただいたメールアドレスに確認用のリンクをお送りしました。') }}
                </div>
            @endif
            <p class="mb-6">
                {{ __('メールに送信されたURLをクリックして認証を行ってください。') }} <br>

                {{ __('もし確認用メールが送信されていない場合は、下記をクリックしてください。') }}
            </p>
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn-border">{{ __('確認メールを再送信する') }}</button>.
            </form>
        </div>
    </div>
    {{-- @include('atoms._footer') --}}
@endsection
