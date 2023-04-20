@extends('app')

@section('title', '利用規約')

@php
  $content = __('Comieeの利用規約ページです。サービスの利用条件、禁止事項、著作権、免責事項など、利用に関わる重要事項を記載しています。');
@endphp
@section('description')
  <meta name="description" itemprop="description" content="{{ $content }}">
  <meta property="og:description" content="{{ $content }}">
  <meta name="twitter:description" content="{{ $content }}">
@endsection

@section('content')
  @include('atoms._nav', ['tab' => 0])

  <terms-of-service></terms-of-service>

  <footer-contents></footer-contents>
@endsection
