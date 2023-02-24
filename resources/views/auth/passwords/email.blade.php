@extends('app')

@section('title', __('パスワード再設定のメール送信を送信'))

@section('content')
  @include('atoms._simple_nav')
  <div class="card">
    <h2 class="card-title">
      {{ __('パスワード再設定のメールを送信') }}
    </h2>
    <form method="POST" action="{{ route('password.email', app()->getLocale()) }}" class="px-6 dark:bg-dark-1 pt-6">
      @csrf

      {{-- エラー文 --}}
      @include('atoms._error_card_list')
      @include('atoms.success')


      @if (session('status'))
        <div class="text-green font-semibold bg-green bg-opacity-10 p-4 mb-4">
          {{ session('status') }}
        </div>
      @endif

      <div class="w-full mb-4">
        <input class="card-input" type="text" name="email" required placeholder="メールアドレス">
      </div>
      <button type="submit" class="btn-primary px-6 py-3 md:py-4 w-full mb-4">{{ __('パスワードリセットリンクを送信') }}</button>
    </form>
  </div>
@endsection
