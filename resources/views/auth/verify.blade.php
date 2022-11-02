@extends('app')

@section('content')
    @include('atoms._simple_nav')

    <div class="mt-8">
        <div class="max-w-lg mx-4 md:mx-auto bg-white rounded shadow">
            <div class="text-[#5A5777] dark:text-ddd bg-[#F2F2F2] dark:bg-dark-1 font-semibold text-lg py-3 px-4">
                {{ __('メールアドレスをご確認ください') }}
            </div>

            <div class="p-6 dark:bg-dark-1">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('ご登録いただいたメールアドレスに確認用のリンクをお送りしました。') }}
                    </div>
                @endif
                <p class="mb-6">
                    {{ __('メールをご確認ください。') }} <br>
                    {{ __('もし確認用メールが送信されていない場合は、下記をクリックしてください。') }}
                </p>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn-border">{{ __('確認メールを再送信する') }}</button>.
                </form>
            </div>
        </div>
    </div>

    {{-- @include('atoms._footer') --}}
@endsection
