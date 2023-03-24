@extends('app')
@section('title', __('リリースノート'))

@php
  $content = __('Comieeに関する特定商取引法及び資金決済法に基づく表示情報が記載されています。運営会社、連絡先、販売条件などをご確認ください。');
@endphp
@section('description')
  <meta name="description" itemprop="description" content="{{ $content }}">
  <meta property="og:description" content="{{ $content }}">
  <meta name="twitter:description" content="{{ $content }}">
@endsection

@section('content')
  @include('atoms._nav', ['tab' => 0])
  <div class="max-w-4xl m-6 md:my-16 md:mx-auto leading-8">
    <release-note></release-note>
  </div>
  @include('atoms._footer')
@endsection
