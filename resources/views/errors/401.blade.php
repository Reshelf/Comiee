@extends('app')

@section('title', __('Unauthorized'))

@section('content')
  @include('atoms._simple_nav')

  <div class="max-w-md m-8 md:mx-auto bg-white dark:bg-dark-1 rounded border border-eee dark:border-none">
    <h2 class="card-title mb-6">
      401 | Unauthorized
    </h2>

    <p class="px-6">{{ __('アカウントからログアウトされています。操作を実行するにはログインをしてください。') }}</p>

    <div class="w-full flex justify-between pb-4 px-6 mt-6">
      <a href="/login" class="inline-block btn-border">{{ __('ログイン') }}</a>
    </div>
  </div>
@endsection
