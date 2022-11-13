@extends('app')

@section('title', __('Forbidden'))

@section('content')
    @include('atoms._simple_nav')

    <div class="max-w-md m-8 md:mx-auto bg-white dark:bg-dark-1 rounded border border-eee dark:border-none">
        <h2 class="text-[#5A5777] dark:text-ddd bg-[#F2F2F2] dark:bg-dark-1 font-semibold text-lg pt-3 px-4 pb-6">
            {{-- {{ __('ログイン') }} --}}
            403 | Forbidden
        </h2>

        <p class="px-6">要求された操作は禁止されているリクエストです。</p>

        <div class="w-full flex justify-between pb-4 px-6 mt-6">
            <a href="/" class="inline-block btn-border">トップページへ</a>
        </div>
    </div>
@endsection
