@extends('app')

@section('title', __('Forbidden'))

@section('content')
  @include('atoms._simple_nav')

  <div class="max-w-md m-8 md:mx-auto bg-white dark:bg-dark-1 rounded border border-eee dark:border-none">
    <h2 class="card-title mb-6">
      403 | Forbidden
    </h2>

    <p class="px-6">{{ __('要求された操作は禁止されているリクエストです。') }}</p>

    <div class="w-full flex justify-between pb-4 px-6 mt-6">
      <a href="/" class="inline-block btn-border">{{ __('トップページへ') }}</a>
    </div>
  </div>
@endsection
