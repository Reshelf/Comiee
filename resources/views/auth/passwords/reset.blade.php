@extends('app')

@section('title', __('パスワード再設定'))

@section('content')
  @include('atoms._simple_nav')
  <div class="card">
    <h2 class="card-title">
      {{ __('パスワードを再設定') }}
    </h2>
    <form method="POST" action="{{ route('password.update') }}" class="px-6 dark:bg-dark-1 pt-6">
      @csrf

      {{-- エラー文 --}}
      @include('atoms._error_card_list')
      @include('atoms.success')


      {{-- ないとエラーになる --}}
      <input type="hidden" name="email" value="{{ $email }}">
      <input type="hidden" name="token" value="{{ $token }}">


      <div class="w-full mb-3">
        <input class="card-input" type="password" name="password" required placeholder="{{ __('新しいパスワード') }}">
      </div>
      <div class="w-full mb-3">
        <input class="card-input" type="password" name="password_confirmation" required placeholder="{{ __('パスワード') }}">
      </div>
      <input type="hidden" name="remember" value="on">
      <button type="submit" class="btn-primary px-6 py-3 md:py-4 w-full mb-4">{{ __('送信') }}</button>
    </form>
  </div>
@endsection
