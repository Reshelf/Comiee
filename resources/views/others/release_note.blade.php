@extends('app')
@section('title', __('リリースノート'))

@php
  $content = __('「リリースノートのお知らせページ」では、最新のソフトウェアやアプリのリリース情報を提供しています。新しい機能やアップデート内容、バグ修正、パフォーマンス向上などの変更点が掲載されているため、ユーザーは常に最新情報を確認することができます。また、アップグレード手順やサポート情報も提供されており、安心してアップデートを行うことができます。リリースノートを確認することで、ソフトウェアやアプリの品質向上に貢献することができます。');
@endphp
@section('description')
  <meta name="description" itemprop="description" content="{{ $content }}">
  <meta property="og:description" content="{{ $content }}">
  <meta name="twitter:description" content="{{ $content }}">
@endsection

@section('content')
  @include('atoms._nav', ['tab' => 0])

  <release-note></release-note>

  <footer-contents></footer-contents>
@endsection
