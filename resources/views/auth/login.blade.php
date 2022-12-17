@extends('app')

@section('title', __('ログイン'))

@section('content')
  @include('atoms._simple_nav')
  <div class="max-w-md m-8 md:mx-auto bg-white dark:bg-dark-1 rounded border border-eee dark:border-none">
    <h2 class="card-title">
      {{ __('ログイン') }}
    </h2>
    <form method="POST" action="{{ route('login', app()->getLocale()) }}" class="px-6 dark:bg-dark-1 pt-6"
      onsubmit="submit_btn()">
      @csrf

      {{-- エラー文 --}}
      @include('atoms._error_card_list')
      @include('atoms.success')


      <div class="w-full mb-3">
        <input class="card-input" type="text" name="email" required placeholder="{{ __('メールアドレス') }}">
      </div>
      <div class="w-full mb-6">
        <input class="card-input" type="password" name="password" required placeholder="{{ __('パスワード') }}">
      </div>
      <input type="hidden" name="remember" value="on">
      <div class="relative mb-4">
        <button type="submit" class="submit_btn2 btn-primary px-6 py-3 md:py-4 w-full">
          {{ __('ログイン') }}
          <span class="load loading"></span>
        </button>
      </div>
    </form>
    <div class="w-full flex justify-between pb-4 px-6">
      <a href="{{ route('password.request', app()->getLocale()) }}"
        class="cursor-pointer text-xs">{{ __('パスワードを忘れた方') }}</a>
      <a href="/register" class="text-xs cursor-pointer">{{ __('または新規登録') }}</a>
    </div>
  </div>
@endsection
