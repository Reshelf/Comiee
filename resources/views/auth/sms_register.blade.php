@extends('app')

@section('title', 'SMS認証')

@section('content')
    @include('atoms._simple_nav')
    <div class="max-w-md m-8 md:mx-auto bg-white dark:bg-dark-1 rounded border border-eee dark:border-none">
        <h2 class="text-[#5A5777] dark:text-ddd bg-[#F2F2F2] dark:bg-dark-1 font-semibold text-lg pt-3 p-4 mb-6">
            {{ __('SMS認証') }}
        </h2>
        <form method="POST" action="{{ route('verify.sms.send', app()->getLocale()) }}" class="px-6 dark:bg-dark-1">
            @csrf

            {{-- エラー文 --}}
            @include('atoms._error_card_list')
            @include('atoms.success')


            <div class="w-full mb-4">
                <input
                    class="w-full text-[15px] px-2 py-3 rounded-[3px] border border-l-0 border-r-0 border-t-0 border-b-ccc dark:border-b-dark dark:bg-dark-2"
                    type="tel" name="phone_number" required>
            </div>

            <input type="hidden" name="remember" value="on">
            <button type="submit" class="btn-primary px-6 py-4 w-full mb-4">{{ __('認証コードを送信') }}</button>
        </form>
    </div>
@endsection
