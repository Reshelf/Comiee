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

  <div class="max-w-4xl mx-8 lg:mx-auto mt-16 mb-32 tracking-widest">
    <h2 class="text-xl font-semibold mb-8">Company Info</h2>
    <div class="">
      <div class="flex items-center mb-8">
        <div class="w-1/2 md:w-32 text-xs font-semibold">{{ __('会社名') }}</div>
        <div class="w-1/2 md:w-auto text-base">{{ __('Reshelf合同会社') }}</div>
      </div>
      <div class="flex items-center mb-8">
        <div class="w-1/2 md:w-32 text-xs font-semibold">{{ __('設立') }}</div>
        <div class="w-1/2 md:w-auto text-base">{{ __('2021年06月23日') }}</div>
      </div>
      <div class="flex items-center mb-8">
        <div class="w-1/2 md:w-32 text-xs font-semibold">{{ __('事業内容') }}</div>
        <div class="w-1/2 md:w-auto text-base">{{ __('マンガ投稿アプリ「Comiee」の企画・開発・運用') }}</div>
      </div>
      <div class="flex items-center mb-8">
        <div class="w-1/2 md:w-32 text-xs font-semibold">{{ __('代表者') }}</div>
        <div class="w-1/2 md:w-auto text-base">{{ __('田中 俊一朗') }}</div>
      </div>
      <div class="flex items-start">
        <div class="w-1/2 md:w-32 text-xs font-semibold">{{ __('所在地') }}</div>
        <div class="w-1/2 md:w-auto text-base">
          {{ __('〒107-0062') }}<br>
          {{ __('東京都港区南青山２丁目２番１５号') }}<br>
          {{ __('WIN青山531') }}
        </div>
      </div>
    </div>
  </div>

  @include('atoms._footer')
@endsection
