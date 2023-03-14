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
        <template #header>Comieeへようこそ</template>
        <div class="text-base">
          <p>アカウント登録が正常に完了しました。</p>
          <p class="mt-2">これからあなたのマンガ活動が始まります。</p>
          <p class="mt-2">多くのマンガと出会い、輪を広げていきましょう！</p>
          <p class="mt-4">Comiee（コミー）について知りたい方向けに役立つページ</p>
          <p class="mt-2">
            <a href="{{ route('others.user_guide', app()->getLocale()) }}" class="text-primary">・ご利用ガイド</a><br>
            <a href="{{ route('others.about.comiee', app()->getLocale()) }}" class="text-primary">・Comieeについて</a><br>
            <a href="{{ route('others.faq', ['lang' => app()->getLocale(), 'number' => 1]) }}"
              class="text-primary">・よくあるご質問</a><br>
          </p>
        </div>
      </setup-modal>
    </div>
  </div>
@endsection
