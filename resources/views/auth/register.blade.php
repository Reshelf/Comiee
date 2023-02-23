@extends('app')

@section('title', __('アカウント登録'))

@section('content')
  @include('atoms._simple_nav')
  <div class="max-w-md m-8 md:mx-auto bg-white rounded-lg border border-eee dark:border-none">
    <h2 class="card-title">
      {{ __('アカウント登録') }}
    </h2>

    <form method="POST" action="{{ route('register', app()->getLocale()) }}" class="dark:bg-dark-1 p-6 pb-0"
      onsubmit="submit_btn()">
      @csrf

      {{-- エラー文 --}}
      @include('atoms._error_card_list')
      @include('atoms.success')


      <div class="w-full mb-3">
        <input class="card-input" type="email" name="email" required placeholder="{{ __('メールアドレス') }}">
      </div>
      <div class="w-full mb-6">
        <p class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
          {{ __('8文字以上の数字、大文字小文字を含むパスワード') }}
        </p>
        <input class="card-input" type="password" name="password" required placeholder="{{ __('パスワード') }}">
      </div>

      {{-- 性別 --}}
      <div class="filters flex flex-col mb-8">
        <h3 class="tracking-widest text-[15px] font-semibold">{{ __('性別') }}</h3>
        <div class="flex items-center mt-4">
          {{-- 縦スク --}}
          <input class="visually-hidden" type="radio" name="gender" value="man" id="gender_man" />
          <label for="gender_man">
            {{ __('男性') }}
          </label>
          {{-- 横読み --}}
          <input class="visually-hidden" type="radio" name="gender" value="woman" id="gender_woman" />
          <label for="gender_woman" class="ml-4">
            {{ __('女性') }}
          </label>
        </div>
      </div>


      {{-- 誕生日 --}}
      <h3 class="tracking-widest mb-4 font-semibold">{{ __('誕生日') }}</h3>
      <div class="mb-8">
        <input type="date" name="birth" id="birth">
      </div>

      <div class="mb-4">
        <a href="{{ route('others.terms', app()->getLocale()) }}" class="text-primary" target="_blank"
          rel="noopener noreferrer">{{ __('利用規約') }}</a>
        {{ __('と') }} <a href="{{ route('others.privacy', app()->getLocale()) }}" class="text-primary"
          target="_blank" rel="noopener noreferrer">{{ __('プライバシーポリシー') }}</a> {{ __('に同意して') }}
      </div>

      <div class="relative">
        <button class="submit_btn2 btn-primary px-6 py-3 md:py-4 w-full" type="submit">
          {{ __('アカウント登録') }}
          <span class="load loading"></span>
        </button>
      </div>
    </form>

    <div class="flex justify-end dark:bg-dark-1">
      <a href="/login" class="inline-block text-xs cursor-pointer py-4 px-6 hover:text-primary">{{ __('またはログイン') }}</a>
    </div>
  </div>
@endsection
