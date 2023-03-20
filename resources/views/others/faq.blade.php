@extends('app')
@section('title', $faq_title)

@php
  $content = __('Comieeのよくあるご質問ページでは、利用方法やアカウント設定、支払い方法、その他サービスに関する疑問に対する回答を提供しています。');
@endphp
@section('description')
  <meta name="description" itemprop="description" content="{{ $content }}">
  <meta property="og:description" content="{{ $content }}">
  <meta name="twitter:description" content="{{ $content }}">
@endsection

@include('others.faq.faq_contents', ['title' => $faq_title])
