@extends('app')

@section('title', __('Comieeについて'))
@php
  $faq_number = 1;
  $update_date = '2023/3/5';
  $content = 'Comieeは作者がマンガを無料でアップロード・公開をして、ユーザーがそのコンテンツを楽しんで応援できるオンラインマンガプラットフォームです。だれもがマンガを楽しんで続けられるよう、安心できる雰囲気や、多様性を大切にしています。';
@endphp

@section('description')
  <meta name="description" itemprop="description" content="{{ $content }}">
  <meta property="og:description" content="{{ $content }}">
  <meta name="twitter:description" content="{{ $content }}">
@endsection

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
          {{ __('Comieeは作者がマンガを無料でアップロード・公開をして、ユーザーがそのコンテンツを楽しんで応援できるオンラインマンガプラットフォームです。だれもがマンガを楽しんで続けられるよう、安心できる雰囲気や、多様性を大切にしています。') }}
        </p>
        <p class="mb-4">
          {{ __('このサービスでは、普通のひともプロの作者さんも、あらゆるひとが好きなマンガを見つけたり、おもしろい人に出会えたりするチャンスが広がっています。あなたもComieeでの作品や交流を楽しんでください！') }}
        </p>
        <h3 class="font-bold">{{ __('Comieeでできること') }}</h3>
        <div class="mb-4">
          <p>{{ __('・自分の描いたマンガ作品を投稿する') }}</p>
          <p>{{ __('・好きな作者さんのマンガを読んで、応援する') }}</p>
        </div>
        <p class="mb-4">{{ __('この記事では、Comieeの特徴や過ごし方をご紹介します。') }}</p>
      </div>

      {{-- Comieeとは --}}
      <div id="about_comiee" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-xl font-bold mb-4 pb-4 border-b border-[#dadce0] dark:border-dark-1">{{ __('Comieeとは') }}</h2>
        <p class="mb-4">{{ __('だれもが自分の「メディア」を簡単に作ることができる、プラットフォームです。Comieeでは、みんなが思い思いのジャンルで創作を自由に楽しんでいます。') }}</p>
      </div>

      {{-- Comieeが大切にしていること --}}
      <div id="important" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-xl font-bold mb-4 pb-4 border-b border-[#dadce0] dark:border-dark-1">{{ __('Comieeが大切にしていること') }}
        </h2>
        <div class="">
          ページビューを増やすことよりも、お金を稼ぐことよりも、あるいはフォロワーを集めることよりも、何よりも大事なこと。それは、楽しんで、発表し続けることです。

          名文や超大作を仕上げようとして手が止まってしまうくらいなら、駄文でも短文でも悪ふざけでも、とにかく気軽に投稿しましょう。

          短い文章、下手な文章、ラクガキ...、そういったものを恐れて手をとめる必要はありません。まずは、創作したいこと・伝えたいことを世に送り出す。表現力もファンも、あとから十分ついてきます。

          創作活動は、筋トレやランニングと同じです。一時期に集中して取り組んだら、それで終わりではありません。ちょっとずつで良いので日常生活の一部にすること、クセをつけることがポイントです。

          創作活動でもっとも大事なこと。それは「創作を楽しみ続ける」「ずっと発表し続ける」こと。この2つを、頭のかたすみに置いておいてください。



          創作を楽しみ続けるために、発信のときにほんの少し、意識してもらうとよいことをまとめました。

          これからの人生で、長く付き合うことになるインターネット。うまく使いこなして楽しんだ方が、きっと楽しい人生につながるはずです。
        </div>
      </div>

      {{-- Comieeの特徴 --}}
      <div id="important" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-xl font-bold mb-4 pb-4 border-b border-[#dadce0] dark:border-dark-1">{{ __('Comieeの特徴') }}</h2>
        <div class="">
          Comieeはニューヨークのような「街」を目指しています。そこは、ウォールストリートのような金融街、高級住宅街、中華街から劇場、自然あふれる大きな公園まで、あらゆる文化圏のひとたちが共生している場所。

          とても一般的でプレーンなサービス名には、だれもがどんなことでも書けるように。それぞれの価値観や生活スタイルの違いを楽しみ、隣のコミュニティを揶揄することなく、共存していける空間づくりをしています。

          クリエイターに直接、書籍化のお声がかかることもありますし、Comieeも後押しできるようにサポートをしています。たとえば、メディアとパートナーシップを結んで、定期的におすすめの作品をご紹介して、活躍の場を広げる「クリエイター支援プログラム」をおこなっています。

          さあ、ここまで読んでいただいたあなたは、もうComieeの街の住民です。早速Comieeを使って、あたらしい交流のかたちを楽しみながら、いっしょに、創作の輪を広げていきましょう！
        </div>
      </div>

      {{-- Comieeで投稿するときに、まずやってほしいこと --}}
      <div id="to_do_first" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-xl font-bold mb-4 pb-4 border-b border-[#dadce0] dark:border-dark-1">
          {{ __('Comieeで投稿するときに、まずやってほしいこと') }}</h2>
        <div class="">
          以下のリンクから、関連する記事をご紹介しています。

          ▼ プロフィールを充実させる

          ▼ 投稿画面でできること

          ▼ 「スキ」リアクションの活用アイデアまとめ
        </div>
      </div>

      {{-- 読者としてComieeを楽しむ方法 --}}
      <div id="enjoy_as_a_reader" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-xl font-bold mb-4 pb-4 border-b border-[#dadce0] dark:border-dark-1">
          {{ __('読者としてComieeを楽しむ方法') }}
        </h2>
        <div class="">
          Comieeでは、記事を書くひとだけでなく、読者もクリエイターの1人です。読んだ感想を伝えたり、「スキ」を押したりすることは、記事を書いたひとを励まし、勇気づけ、ときには創作のヒントとなって、彼らの次の作品づくりにつながるかもしれません。

          どうやって記事にたどりつけば良いのかかわからない。そんなときは、Comieeロゴ下の段の [おすすめ] をを覗いてみるのがおすすめです。

          ワクワクする記事、ほっこりする記事、タメになる記事、あなたに新しい視点を提示してくれる記事。そんな出会いがあったときは「スキ」や「フォロー」をしてみてください。コメントをしたり、自分の記事で紹介したり、SNSでシェアしたり…自分から反応すると、クリエイターやそのファンとつながれるかもしれません。
        </div>
      </div>

      {{-- Comieeをもっと使いこなしたい方へ --}}
      <div id="want_to_use_more" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-xl font-bold mb-4 pb-4 border-b border-[#dadce0] dark:border-dark-1">
          {{ __('Comieeをもっと使いこなしたい方へ') }}</h2>
        <div class="">
          Comieeは、クリエイターが創作の幅を広げるために、「コミュニティでつながる」「コンテンツをとどける」ための4つの機能をご用意しています。

          以下の記事では、それぞれの機能の特徴と、実際に活用しているクリエイターの代表的な事例を紹介しています。

          ▼ 有料記事の活用事例

          ▼ 有料マガジンの活用事例

          ▼ 定期購読マガジンの活用事例

          ▼ メンバーシップの活用事例



          以下の記事では、活用する用途別におすすめの使い方を紹介しています。

          ▼ フリーランスのみなさんへ

          ▼ 俳優やタレントなど個人で活動するみなさんへ

          ▼ 飲食店を経営するみなさんへ

          ▼ 教育に関わるみなさんへ

          ▼ 公共事業に関わるみなさんへ

          ▼ お店やECなど小売業に関わるみなさんへ

          ▼ エンタメや文化活動に関わるみなさんへ
        </div>
      </div>

      {{-- 最後に --}}
      <div id="lastly" class="my-12 leading-8 text-base whitespace-pre-line">
        <h2 class="text-xl font-bold mb-4 pb-4 border-b border-[#dadce0] dark:border-dark-1">{{ __('最後に') }}</h2>
        <div class="">
          より詳しい使い方は、Comieeヘルプセンターに記載してあります。このページだけでは伝えきれないことも書いてあるので、困ったときは一度ご覧ください。

          ▼ Comieeヘルプセンター

          もしComieeを使っていく上で、「〇〇だったらいいのにな…」と思うところがあれば、ぜひ以下のフォームからご意見をお聞かせください。

          ▼ 機能に関するカイゼン・ご要望はこちら

          ▼ その他のお問い合わせはこちら



          Comieeはだれもが自由に創作を楽しんで、続けるためのサービスです。どう使うかは、あなた次第。好きなことや伝えたいことを投稿したり、クリエイターの記事を読んで応援したり、おなじ趣味や思いを持ったひととつながったり。

          この記事が、Comieeを歩いていくための羅針盤になれば、うれしいです。

          最後にもう一度。Comieeへ、ようこそ！
        </div>
      </div>
    </div>
  </div> @include('atoms._footer')
@endsection
