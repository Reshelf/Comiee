@extends('app')

@section('title', __('新規登録'))

@section('content')
    @include('atoms._simple_nav')
    <div class="max-w-md m-8 md:mx-auto bg-white rounded border border-eee dark:border-none">
        <h2 class="text-[#5A5777] dark:text-ddd bg-[#F2F2F2] dark:bg-dark-1 font-semibold text-lg pt-3 p-4">
            {{ __('新規登録') }}
        </h2>

        <form method="POST" action="{{ route('register', app()->getLocale()) }}" class="px-6 dark:bg-dark-1 pt-6">
            @csrf

            {{-- エラー文 --}}
            @include('atoms._error_card_list')
            @include('atoms.success')


            <div class="w-full mb-3">
                <input
                    class="w-full text-[15px] px-2 py-3 rounded-[3px] border border-l-0 border-r-0 border-t-0 border-b-ccc dark:border-b-dark dark:bg-dark-2"
                    type="email" name="email" required placeholder="{{ __('メールアドレス') }}">
            </div>
            <div class="w-full mb-6">
                <p class="mb-2 bg-orange bg-opacity-10 text-orange px-4 py-2 font-semibold text-xs">
                    {{ __('パスワードは8文字以上で数字、大文字、小文字を1文字以上含めるようにしてください') }}
                </p>
                <input
                    class="w-full text-[15px] px-2 py-3 rounded-[3px] border border-l-0 border-r-0 border-t-0 border-b-ccc dark:border-b-dark dark:bg-dark-2"
                    type="password" name="password" required placeholder="{{ __('パスワード') }}">
            </div>

            <label class="light-checkbox my-4">
                <input type="checkbox" value="" class="light-checkbox-Input" required>
                <span class="light-checkbox-DummyInput">
                    <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </span>
                <span class="light-checkbox-LabelText"><a href="{{ route('others.terms', app()->getLocale()) }}"
                        class="text-primary" target="_blank" rel="noopener noreferrer">{{ __('利用規約') }}</a>
                    {{ __('と') }} <a href="{{ route('others.privacy', app()->getLocale()) }}" class="text-primary"
                        target="_blank" rel="noopener noreferrer">{{ __('プライバシーポリシー') }}</a> {{ __('に同意する') }}</span>
            </label>

            <button class="btn-primary px-6 py-4 w-full" type="submit">{{ __('メールアドレスで登録') }}</button>
        </form>

        <div class="flex justify-end dark:bg-dark-1">
            <a href="/login"
                class="inline-block text-xs cursor-pointer py-4 px-6 hover:text-primary">{{ __('またはログイン') }}</a>
        </div>
    </div>
@endsection
