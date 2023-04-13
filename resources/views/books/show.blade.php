@extends('app')

@php
  $a = __('エピソード');
  $b = __('作品情報');
  $c = __('コメント');
  $d = __('件');
@endphp

@section('title', $book->title)

@isset($book->thumbnail)
  @section('image')
    <meta property="og:image" content="{{ $book->thumbnail }}">
    <meta property="og:image:secure_url" content="{{ $book->thumbnail }}">
    <meta name="twitter:image" content="{{ $book->thumbnail }}">
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
  @include('atoms._nav', ['tab' => 0])

  <div class="w-full h-full bg-white dark:bg-dark">
    <div class="max-w-7xl mx-auto md:py-8 flex flex-col md:flex-row justify-between">
      {{-- 左サイドバー --}}
      @include('books.atoms.leftSidebar', ['sns_title' => $book->title])

      <div class="w-full flex flex-col md:flex-row py-8">
        {{-- メインコンテンツ --}}
        <div class="px-6 lg:w-2/3">
          @include('books.atoms.main')

          {{-- ユーザー情報を取得 --}}
          {{-- <get-user-info endpoint="'{{ route('analytics.book.store') }}'"></get-user-info> --}}
          <bounce-rate-tracker :user="{{ json_encode(Auth::user()) }}" :book="{{ json_encode($book) }}"
            bounce-rate-endpoint="{{ route('analytics.book.bounce_rate') }}"></bounce-rate-tracker>
        </div>

        {{-- 右サイドバー --}}
        <div class="mt-8 lg:mt-0 px-6 lg:pr-0 md:pl-4 lg:w-1/3">
          @include('books.atoms.rightSidebar')
        </div>
      </div>
    </div>
  </div>

@endsection
