@extends('app')

@section('title', $user->name . __('さんのフォロー'))

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
        <template #header>{{ $user->name }}{{ __('さんのフォロー') }}</template>
        @if ($followings->count())
          @foreach ($followings as $person)
            @include('users.atoms.person')
          @endforeach
        @else
          <p>{{ __('フォローしている人はいません') }}</p>
        @endif
      </follow-modal>
    </div>
  </div>
@endsection
