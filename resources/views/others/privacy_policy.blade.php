@extends('app')

@section('title', 'プライバシーポリシー')

@php
  $content = __('Comieeのプライバシーポリシーでは、お客様の個人情報の収集・利用・管理に関する方針を明確にし、プライバシー保護に努めています。');
@endphp
@section('description')
  <meta name="description" itemprop="description" content="{{ $content }}">
  <meta property="og:description" content="{{ $content }}">
  <meta name="twitter:description" content="{{ $content }}">
@endsection

@section('content')
  @include('atoms._nav', ['tab' => 0])

  <privacy-policy></privacy-policy>

  <footer-contents></footer-contents>
@endsection
