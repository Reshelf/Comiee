@extends('app')
@section('title', __('アカウント登録が正常に完了しました。'))

@php
  $content = __('アカウント登録が正常に完了しました。');
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
      <setup-modal :user='@json($user)'>
        <template #header>{{ __('Comieeへようこそ') }}</template>
        <div class="text-base">
          <p>{{ __('アカウント登録が正常に完了しました。') }}</p>
          <p class="mt-2">{{ __('これからあなたのマンガ活動が始まります。') }}</p>
          <p class="mt-2">{{ __('多くのマンガと出会い、輪を広げていきましょう！') }}</p>
          <p class="mt-4">{{ __('Comiee（コミー）について知りたい方向けに役立つページ') }}</p>
          <p class="mt-4">
            <a href="{{ route('others.user_guide') }}" class="block text-primary dark:text-[#8ab4f8] mb-2">・ご利用ガイド</a>
            <a href="{{ route('others.about.comiee') }}"
              class="block text-primary dark:text-[#8ab4f8] mb-2">・Comieeについて</a>
            <a href="{{ route('others.faq', ['number' => 1]) }}"
              class="block text-primary dark:text-[#8ab4f8]">・よくあるご質問</a>
          </p>
        </div>
      </setup-modal>
    </div>
  </div>
@endsection
