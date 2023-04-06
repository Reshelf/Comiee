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
  <div class="max-w-4xl m-8 md:my-16 md:mx-auto leading-8">
    <h2 class="text-3xl mb-16">{{ __('「特定商取引に関する法律」及び「資金決済に関する法律」に基づく表示') }}</h2>

    <h3 class="text-2xl mt-12 mb-4">{{ __('事業者名及び連絡先') }}</h3>
    <div class="mb-10 mt-4 text-[15px]">
      <p class="my-2">
        {{ __('Comiee運営チーム') }}<br>
        {{ __('代表者 田中俊一朗') }}<br>
        {{ __('所在地 〒107-0062 東京都港区南青山２丁目２番１５号 WIN青山531') }}<br>
        {{ __('お問合せ先') }}　<a href="mailto:support@comiee.one?subject={{ __('お問い合わせ') }}"
          class="text-primary dark:text-[#8ab4f8]" target="_blank" rel="noopener">support@comiee.one</a>
      </p>
    </div>

    <h3 class="text-2xl mt-12 mb-4">{{ __('販売価格') }}</h3>
    <div class="mb-10 mt-4 text-[15px]">
      <p class="my-2">
        {{ __('作品毎のエピソード価格欄をご覧ください。') }}
      </p>
    </div>

    <h3 class="text-2xl mt-12 mb-4">{{ __('支払い方法') }}</h3>
    <div class="mb-10 mt-4 text-[15px]">
      <p class="my-2">
        {{ __('サイトおよびアプリ内の表示をご覧ください。') }}
      </p>
    </div>

    <h3 class="text-2xl mt-12 mb-4">{{ __('提供時期') }}</h3>
    <div class="mb-10 mt-4 text-[15px]">
      <p class="my-2">
        {{ __('決済完了後、直ちに提供いたします。') }}
      </p>
    </div>

    <h3 class="text-2xl mt-12 mb-4">{{ __('作品購入以外でお客様に発生する料金') }}</h3>
    <div class="mb-10 mt-4 text-[15px]">
      <p class="my-2">
        {{ __('当サイトのページの閲覧、作品購入等に必要となるインターネット接続料金、通信料金等はお客様の負担となります。') }}
      </p>
    </div>

    <h3 class="text-2xl mt-12 mb-4">{{ __('返品について') }}</h3>
    <div class="mb-10 mt-4 text-[15px]">
      <p class="my-2">
        {{ __('商品の性質上、返品はできかねます。') }}
      </p>
    </div>

    <h3 class="text-2xl mt-12 mb-4">{{ __('動作環境') }}</h3>
    <div class="mb-10 mt-4 text-[15px]">
      <p class="my-2">
        {{ __('ヘルプをご覧ください。') }}
      </p>
    </div>
  </div>
  @include('atoms._footer')
@endsection
