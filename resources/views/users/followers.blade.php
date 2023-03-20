@extends('app')

@section('title', $user->name . __('さんのフォロワー'))

@php
  $content = $user->name . __('さんのフォロワー');
@endphp
@section('description')
  <meta name="description" itemprop="description" content="{{ $content }}">
  <meta property="og:description" content="{{ $content }}">
  <meta name="twitter:description" content="{{ $content }}">
@endsection

@section('content')
  @include('atoms._nav', ['tab' => 0])
  <div class="">
    @include('users.atoms.user', [
        'work' => false,
        'about' => false,
    ])
  </div>
  <div class="flex max-w-lg w-full mx-auto px-6 md:px-0 justify-center">
    <div class="py-8 w-full">
      <follow-modal :user-name='@json($user->name)'>
        <template #header>{{ $user->name }} {{ __('さんのフォロワー') }}</template>
        @if ($followers->count())
          @foreach ($followers as $person)
            @include('users.atoms.person')
          @endforeach
        @else
          <p>{{ __('フォロワーはいません') }}</p>
        @endif
      </follow-modal>
    </div>
  </div>
@endsection
