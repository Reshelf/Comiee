@extends('app')

@section('title', $user->name . __('さんのフォロワー'))

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
      <setup-modal :user='@json($user)'>
        <template #header>Comieeへようこそ！</template>
      </setup-modal>
    </div>
  </div>
@endsection
