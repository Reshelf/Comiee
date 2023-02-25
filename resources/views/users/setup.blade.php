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
        <template #header>パーソナライズ</template>
        <form method="POST"
          action="{{ route('users.update', ['lang' => app()->getLocale(), 'username' => $user->username]) }}"
          enctype="multipart/form-data" onsubmit="submit_btn()">
          @csrf
          @method('PATCH')
          {{-- @include('users.atoms.form', ['setup' => true, 'setup_update' => false]) --}}
          <div class="relative">
            <button type="submit" class="submit_btn3 btn-primary w-full lg:py-4">
              {{ __('設定する') }}
              <span class="load loading"></span>
            </button>
          </div>
        </form>
      </setup-modal>
    </div>
  </div>
@endsection
