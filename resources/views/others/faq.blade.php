@extends('app')
@section('title', $faq_title)

@php
  $content = __('Comiee（コミー）のよくあるご質問ページでは、利用者から寄せられる疑問や質問に対する回答を提供しています。アカウント作成やログイン、投稿方法、サポート、利用規約やプライバシーポリシーなど、さまざまなトピックについての情報が記載されており、利用者がサービスを円滑に利用するためのサポートを提供しています。このページは、Comieeの利用に関する疑問やトラブルを解決するためのリソースとして役立ちます。');
@endphp
@section('description')
  <meta name="description" itemprop="description" content="{{ $content }}">
  <meta property="og:description" content="{{ $content }}">
  <meta name="twitter:description" content="{{ $content }}">
@endsection

@include('others.faq.faq_contents', ['title' => $faq_title])
