@extends('app')

@section('title', __('Comieeについて'))

@php
  $faq_number = 1;
  $update_date = '2023/3/5';
@endphp
@section('content')
  @include('atoms._nav', ['tab' => 0])
  <div class="w-full flex flex-col md:flex-row">

    {{-- メニュー --}}
    <div class="w-full md:w-[30%] bg-f8 dark:bg-dark p-8 flex flex-col items-end">
      <div class="lg:h-[500px] top-[20px] sticky  w-full md:w-auto md:pr-8">
        <div class="flex justify-start mb-12 text-xs">
          <a href="{{ route('others.user_guide', app()->getLocale()) }}" class="pr-2">Help Center</a>>
          <a href="{{ route('others.about.comiee', app()->getLocale()) }}" class="pl-2">{{ __('Comieeについて') }}</a>
        </div>

        <div class="my-12">
          <h3 class="text-xs mb-4 cursor-default">
            {{ __('メニュー') }}
          </h3>
          <a href="#welcome" class="pl-4 py-2 mb-2 block">
            {{ __('Comieeへようこそ！') }}</a>
          <a href="#about_comiee" class="pl-4 py-2 mb-2 block">
            {{ __('Comieeとは') }}</a>
          <a href="#important" class="pl-4 py-2 mb-2 block">
            {{ __('Comieeが大切にしていること') }}</a>
          <a href="#features" class="pl-4 py-2 mb-2 block">
            {{ __('Comieeの特徴') }}</a>
          <a href="#to_do_first" class="pl-4 py-2 mb-2 block">
            {{ __('Comieeで投稿するときに、まずやってほしいこと') }}</a>
          <a href="#enjoy_as_a_reader" class="pl-4 py-2 mb-2 block">
            {{ __('読者としてComieeを楽しむ方法') }}</a>
          <a href="#want_to_use_more" class="pl-4 py-2 mb-2 block">
            {{ __('Comieeをもっと使いこなしたい方へ') }}</a>
          <a href="#lastly" class="pl-4 py-2 mb-2 block">
            {{ __('最後に') }}</a>
        </div>
      </div>
    </div>

    {{-- 本文 --}}
    <div class="w-full md:w-[70%] p-8 md:py-8 md:pl-20 md:pr-48">
      <h2 class="text-3xl font-semibold tracking-widest">
        {{ __('はじめてのComieeガイド') }}
      </h2>
      <span class="inline-block mt-4 text-bbb">{{ $update_date }} {{ __('更新') }}</span>

      {{-- Comieeへようこそ！ --}}
      <div id="welcome" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-2xl font-bold mb-4">{{ __('Comieeへ、ようこそ！') }}</h2>
        <p class="mb-4">
          {{ __('noteはクリエイターが文章や画像、音声、動画を投稿して、ユーザーがそのコンテンツを楽しんで応援できるメディアプラットフォームです。だれもが創作を楽しんで続けられるよう、安心できる雰囲気や、多様性を大切にしています。') }}
        </p>
        <p class="mb-4">
          {{ __('この「街」のようなサービスでは、普通のひともプロのクリエイターも、企業も、あらゆるひとが好きなものを見つけたり、おもしろい人に出会えたりするチャンスが広がっています。あなたもnoteでの創作や交流を楽しんでください！') }}
        </p>
        <h3 class="font-bold">{{ __('Comieeでできること') }}</h3>
        <div class="mb-4">
          <p>{{ __('・自分の好きなことや伝えたいことを投稿する') }}</p>
          <p>{{ __('・好きなクリエイターの記事を読んで、応援する') }}</p>
          <p>{{ __('・同じ趣味や思いを持った人と、メンバーシップでつながる') }}</p>
        </div>
        <p class="mb-4">{{ __('この記事では、Comieeの特徴や過ごし方をご紹介します。') }}</p>
      </div>

      {{-- Comieeとは --}}
      <div id="about_comiee" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-2xl font-bold mb-8">{{ __('Comieeとは') }}</h2>
      </div>

      {{-- Comieeが大切にしていること --}}
      <div id="important" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-2xl font-bold mb-8">{{ __('Comieeが大切にしていること') }}</h2>
      </div>

      {{-- Comieeの特徴 --}}
      <div id="important" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-2xl font-bold mb-8">{{ __('Comieeの特徴') }}</h2>
      </div>

      {{-- Comieeで投稿するときに、まずやってほしいこと --}}
      <div id="to_do_first" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-2xl font-bold mb-8">{{ __('Comieeで投稿するときに、まずやってほしいこと') }}</h2>
      </div>

      {{-- 読者としてComieeを楽しむ方法 --}}
      <div id="enjoy_as_a_reader" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-2xl font-bold mb-8">{{ __('読者としてComieeを楽しむ方法') }}</h2>
      </div>

      {{-- Comieeをもっと使いこなしたい方へ --}}
      <div id="want_to_use_more" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-2xl font-bold mb-8">{{ __('Comieeをもっと使いこなしたい方へ') }}</h2>
      </div>

      {{-- 最後に --}}
      <div id="lastly" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-2xl font-bold mb-8">{{ __('最後に') }}</h2>
      </div>
    </div>
  </div> @include('atoms._footer')
@endsection
