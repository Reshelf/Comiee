@extends('app')

@php
  $a = __('エピソード');
  $b = __('作品情報');
  $c = __('コメント');
  $d = __('件');

  $canWatch = false;
  if ($episode->isBoughtBy(Auth::user()) || $book->user->id === Auth::user()->id || $episode->is_free) {
      $canWatch = true;
  }
@endphp

@section('title', $episode->number . __('話') . ' - ' . $book->title)

@isset($episode->thumbnail)
  @section('image')
    <meta property="og:image" content="{{ $episode->thumbnail }}">
    <meta property="og:image:secure_url" content="{{ $episode->thumbnail }}">
    <meta name="twitter:image" content="{{ $episode->thumbnail }}">
  @endsection
@endisset

@isset($book->story)
  @section('description')
    <meta name="description" itemprop="description" content="{{ $book->story }}">
    <meta property="og:description" content="{{ $book->story }}">
    <meta name="twitter:description" content="{{ $book->story }}">
  @endsection
@endisset

@section('content')
  <div class="hidden lg:block">
    @include('atoms._episode_nav', ['tab' => 0])
  </div>
  <div class="block lg:hidden">
    @include('atoms._nav', ['tab' => 1])
  </div>

  {{-- エピソードスクリーン --}}
  {{-- 購入者 or 作者 or 無料 のみ見れる --}}
  @if ($canWatch)
    <episode-screen :title='@json($book->title)' :episode-number='@json($episode->number)'
      :contents='@json($episode->contents ?? [])' endpoint="{{ url('/') }}">
    </episode-screen>
  @endif

  {{-- 有料の場合 --}}
  @if (!$episode->is_free && $book->user->stripe_user_id && $book->user->id !== Auth::user()->id)
    <div class="w-full flex flex-col items-center justify-center">
      <div class="text-3xl mt-4 tracking-widest">
        {{ $book->title }} {{ $episode->number }}{{ __('話') }}</div>
      <div class="mt-8">
        新規エピソードを公開してくれた作者さんに<br>
        エールを贈ってエピソードを読みましょう。
      </div>

      <div class="">
        <form method="POST"
          action="{{ route('stripe.payment.create', ['lang' => app()->getLocale(), 'book_id' => $book->id, 'episode_id' => $episode->id, 'payment' => true]) }}"
          class="whitespace-pre-line" onsubmit="submit_btn()">
          @csrf
          @method('POST')
          {{-- 料金変更 --}}
          <change-payment-price></change-payment-price>

          <div class="relative mt-12">
            <button type="submit" class="submit_btn2 btn-primary py-4 w-full">
              {{ __('エールを贈ってエピソードを読む') }}
              <span class="load loading"></span>
            </button>
          </div>
        </form>

        <div class="text-[11px] mt-4">50〜50,000エールまで応援することができます。(1エール = 1円)</div>

      </div>
    </div>
  @endif

  <div class="w-full mt-8 lg:mt-auto h-full bg-white dark:bg-dark">
    <div class="max-w-7xl mx-auto md:py-8 flex flex-col md:flex-row justify-between">
      {{-- 左サイドバー --}}
      <div class="hidden lg:block">
        @include('books.atoms.leftSidebar', [
            'sns_title' => $episode->number . __('話') . ' - ' . $book->title,
        ])
      </div>

      <div class="w-full flex py-8">

        {{-- メインコンテンツ --}}
        <div class="px-4 md:px-6 w-full lg:w-2/3">
          <book-tab :is-comment="true" :count='@json(count($comments) ?? 0)' :one='@json($a)'
            :two='@json($b)' :three='@json($c)'
            :four='@json($d)'>
            @include('books.episode.tab.1')
            @include('books.episode.tab.2')
            @include('books.episode.tab.3')
          </book-tab>
        </div>


        {{-- 右サイドバー --}}
        <div class="mg:pl-4 lg:w-1/3"></div>
      </div>
    </div>
  </div>

  @include('atoms._footer')
@endsection
