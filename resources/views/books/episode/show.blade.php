@extends('app')

@php
  $a = __('エピソード');
  $b = __('作品情報');
  $c = __('コメント');
  $d = __('件');
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
  {{-- 無料 or 購入者のみ見れる --}}
  @auth
    @if ($episode->price === 0 || $episode->prod_id)
      <episode-screen :title='@json($book->title)' :episode-number='@json($episode->number)'
        :contents='@json($episode->contents ?? [])' endpoint="{{ url('/') }}">
      </episode-screen>
    @endif

    @isset($book->user->stripe_user_id && $episode->prod_id)
      @if (!$episode->is_free && $book->user->id !== Auth::user()->id)
        <div class="overflow-hidden h-[80vh] bg-dark bg-opacity-90 w-full flex flex-col items-center justify-center">
          <div class="text-3xl mt-4 tracking-widest text-white">
            {{ $book->title }} {{ $episode->number }}{{ __('話') }}</div>
          <div class="mt-8">

            {{-- 決済 --}}
            @include('atoms.stripe_script', [
                'book' => $book,
            ])

          </div>
        </div>
      @endif
    @endisset
  @endauth



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
