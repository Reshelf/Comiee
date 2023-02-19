@extends('app')

@php
  $a = __('エピソード');
  $b = __('作品情報');
  $c = __('コメント');
  $d = __('件');

  // 購入者 or 作者 or 無料 のみ見れる
  $canWatch = false;
  if ($episode->isBoughtBy(Auth::user()) || $book->user->id === Auth::user()->id || $book->is_contracted || !$book->is_hidden || $episode->is_free) {
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

  {{-- エピソードスクリーン --}}
  @if ($canWatch)
    <episode-screen :episode-count='@json($book->episodes()->count())' :episode='@json($episode)'
      :lang='@json(Auth::user()->lang)' :book='@json($book)' :comments='@json($comments)'
      :comment-counts='@json(count($comments) ?? 0)'>
    </episode-screen>
  @endif

  {{-- 有料の場合 --}}
  @if (
      !$episode->isBoughtBy(Auth::user()) &&
          !$episode->is_free &&
          $book->user->stripe_user_id &&
          $book->user->id !== Auth::user()->id)
    <div class="w-full h-[70vh] bg-f8 flex flex-col items-center justify-center px-8">
      <div class="text-3xl mt-4 tracking-widest">
        {{ $book->title }} {{ $episode->number }}{{ __('話') }}</div>
      <div class="my-8">
        作者にスーパーエールを送って作品を読もう！
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
              {{ __('スーパーエールでエピソードを読む') }}
              <span class="load loading"></span>
            </button>
          </div>
        </form>

        <div class="text-[11px] mt-4">
          50エールから応援することができます。(1エール = 1円)
        </div>

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

  <div class="hidden lg:block">
    @include('atoms._footer')
  </div>
@endsection
