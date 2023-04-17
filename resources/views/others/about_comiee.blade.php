@extends('app')

@section('title', __('Comieeについて'))
@php
  $faq_number = 1;
  $update_date = '2023/3/11';
  $content = __('Comieeはオンラインマンガ投稿プラットフォームで、クリエイターが作品を投稿し、読者が楽しんでサポートできる場を提供しています。');
@endphp

@section('description')
  <meta name="description" itemprop="description" content="{{ $content }}">
  <meta property="og:description" content="{{ $content }}">
  <meta name="twitter:description" content="{{ $content }}">
@endsection

@section('content')
  @include('atoms._nav', ['tab' => 0])

  <about-comiee></about-comiee>

  @include('atoms._footer')
@endsection
