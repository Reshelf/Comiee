@extends('app')

@section('title', $user->name . __('さんのプロフィール'))

@include('users.atoms.meta')

@section('content')
  @include('atoms._nav', ['tab' => 4])

  <div class="mx-4 lg:mx-0">
    @include('atoms._error_card_list')
    @include('atoms.success')
  </div>

  <div class="bg-white dark:bg-dark">
    @include('users.atoms.user', [
        'work' => true,
        'about' => false,
    ])
  </div>
  <div class="flex max-w-6xl w-full mx-auto mt-4 px-6 md:px-0 justify-center mb-8">
    <div class="w-full md:mx-12">
      <div class="w-full flex flex-wrap justify-center md:justify-start">
        <Works-lists :books='@json($books)' :lang='@json(Auth::user()->lang)' />
        @include('atoms.nomessage')
      </div>
    </div>
  </div>

  @include('atoms._footer')
@endsection
