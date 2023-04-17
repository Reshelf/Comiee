@extends('app')

@section('title', __('会社概要（運営会社）'))

@php
  $content = __('Comieeの運営会社に関する情報が記載されています。企業名、所在地、連絡先、代表者名など、会社概要について確認できます。');
@endphp
@section('description')
  <meta name="description" itemprop="description" content="{{ $content }}">
  <meta property="og:description" content="{{ $content }}">
  <meta name="twitter:description" content="{{ $content }}">
@endsection

@section('content')
  @include('atoms._nav', ['tab' => 0])

  <conpany-contents></conpany-contents>

  @include('atoms._footer')
@endsection
