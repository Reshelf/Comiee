@extends('app')
@section('title', __('ご利用ガイド'))

@php
  $content = __('Comieeのご利用ガイドでは、サービスの基本的な使い方や機能の説明、投稿方法、支援方法などを分かりやすく解説しています。');
@endphp
@section('description')
  <meta name="description" itemprop="description" content="{{ $content }}">
  <meta property="og:description" content="{{ $content }}">
  <meta name="twitter:description" content="{{ $content }}">
@endsection

@section('content')
  @include('atoms._help_nav')
  <div class="w-full bg-f8 dark:bg-dark p-8">
    <div class="max-w-6xl mx-auto">
      <a href="{{ route('others.about.comiee', app()->getLocale()) }}"
        class="block bg-white dark:bg-dark-1 p-12 rounded-[5px] border-2 border-transparent hover:text-primary hover:border-primary dark:hover:text-ddd dark:hover:border-dark cursor-pointer">
        <h3 class="tracking-widest text-[16px] font-semibold">{{ __('Comieeについて') }}</h3>
        <div class="mt-2">{{ __('初めての方はこちらから') }}</div>
      </a>
      <div class="flex flex-col md:flex-row items-center my-8">
        <a href="{{ route('others.faq', ['lang' => app()->getLocale(), 'number' => 1]) }}"
          class="mr-2 block lg:h-[160px] w-full md:w-1/2 bg-white dark:bg-dark-1 p-12 rounded-[5px] border-2 border-transparent hover:text-primary hover:border-primary dark:hover:text-ddd dark:hover:border-dark cursor-pointer">
          <h3 class="tracking-widest text-[16px] font-semibold">{{ __('よくあるご質問') }}</h3>
          <div class="mt-2">{{ __('設定の変更方法など、わからないことがある場合はこちら') }}</div>
        </a>
        <a href="mailto:support@comiee.one?subject={{ __('お問い合わせ') }}" target="_blank" rel="noopener"
          class="ml-2 block lg:h-[160px] w-full md:w-1/2 bg-white dark:bg-dark-1 p-12 rounded-[5px] border-2 border-transparent hover:text-primary hover:border-primary dark:hover:text-ddd dark:hover:border-dark cursor-pointer">
          <h3 class="tracking-widest text-[16px] font-semibold">{{ __('お問い合わせ') }}</h3>
          <div class="mt-2">{{ __('問題が解消しない場合はこちらから') }}</div>
        </a>
      </div>
    </div>
  </div>
  @include('atoms._footer')
@endsection
