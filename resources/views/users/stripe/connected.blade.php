@extends('app')
@section('title', __('Stripe連携が成功しました'))

@section('content')
  @include('atoms._simple_nav')
  <div class="card">
    <h2 class="card-title">
      @if ($success)
        {{ __('連携に成功') }}
      @else
        {{ __('連携に失敗') }}
      @endif
    </h2>
    <div class="m-6">
      @if ($success)
        <p class="bg-green bg-opacity-10 text-green px-4 py-2 font-bold">
          {{ __('Stripeとの連携に成功しました！') }}
        </p>
      @else
        <p class="bg-red bg-opacity-10 text-red px-4 py-2 font-bold">
          {{ __('Stripeとの連携に失敗しました') }}
        </p>
      @endif
    </div>


    <div class="w-full flex justify-end pb-4 px-6">
      <a href="/" class="text-xs cursor-pointer">{{ __('トップページへ') }}</a>
    </div>
  </div>
@endsection
