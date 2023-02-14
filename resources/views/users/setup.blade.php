@extends('app')

@section('title', $user->name . __('さんのフォロワー'))

@section('content')
  @include('atoms._nav', ['tab' => 0])
  <div class="">
    @include('users.atoms.user', [
        'mypage' => false,
        'settings' => false,
    ])
  </div>
  <div class="flex max-w-lg w-full mx-auto px-6 md:px-0 justify-center">
    <div class="py-8 w-full">
      <follow-modal :user-name='@json($user->name)'>
        <template #header>パーソナライズ</template>
      </follow-modal>
    </div>
  </div>
@endsection
