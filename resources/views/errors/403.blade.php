@extends('app')

@section('title', __('Forbidden'))

@section('content')
  @include('atoms._simple_nav')

  <div class="card">
    <h2 class="card-title mb-6">
      403 | Forbidden
    </h2>

    <p class="px-6">{{ __('要求された操作は禁止されているリクエストです。') }}</p>

    <div class="w-full flex justify-between pb-4 px-6 mt-6">
      <a href="/" class="inline-block btn-border">{{ __('トップページへ') }}</a>
    </div>
  </div>
@endsection
