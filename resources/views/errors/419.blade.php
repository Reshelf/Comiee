@extends('app')

@section('title', __('Page Expired'))

@section('content')
    @include('atoms._simple_nav')

    <div class="max-w-md m-8 md:mx-auto bg-white dark:bg-dark-1 rounded border border-eee dark:border-none">
        <h2 class="text-[#5A5777] dark:text-ddd bg-[#F2F2F2] dark:bg-dark-1 font-semibold text-lg pt-3 p-4 mb-6">
            {{-- {{ __('ログイン') }} --}}
            419 | Page Expired
        </h2>

        <p class="px-6">{{ __('ページの有効時間が切れてしまいました。操作を実行するには再びログインしてください。') }}</p>

        <div class="w-full flex justify-between pb-4 px-6 mt-6">
            <a href="/login" class="inline-block btn-border">{{ __('ログイン') }}</a>
        </div>
    </div>
@endsection
