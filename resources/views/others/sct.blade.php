@extends('app')
@section('title', __('「特定商取引に関する法律」及び「資金決済に関する法律」に基づく表示'))

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

  <sct-contents></sct-contents>

  <footer-contents></footer-contents>
@endsection
