@extends('app')

@section('title', 'サービスについて')

@section('description')
  <meta name="description" itemprop="description" content="ご利用ガイドのサービスについてのページです。">
  <meta property="og:description" content="ご利用ガイドのサービスについてのページです。">
  <meta name="twitter:description" content="ご利用ガイドのサービスについてのページです。">
@endsection

@section('content')
  @include('atoms._help_nav')

  <div class="w-full flex flex-col md:flex-row">
    <div class="w-full md:w-[30%] bg-f8 dark:bg-dark
p-8 flex flex-col items-end">
      @include('others.faq.atoms.left_nav')
    </div>

    <div class="w-full md:w-[70%] p-8 md:py-8 md:pl-20 md:pr-48">
      <h2 class="text-3xl font-semibold tracking-widest">サービスについて</h2>
      <span class="inline-block mt-3">2021/1/20</span>

      <div class="my-8 text-base">
        Comieeの概要やご利用に関するご質問をまとめました。

        <div class="flex flex-col text-primary mt-2">
          <a href="#1" class="my-2">・Comieeってどんなアプリ？</a>
          <a href="#2" class="my-2">・推奨環境を教えてください</a>
          <a href="#3" class="my-2">・会員登録は必須ですか？</a>
          <a href="#4" class="my-2">・無料で利用できますか？</a>
        </div>
      </div>

      <div class="my-12">
        <h3 id="1" class="text-2xl font-semibold tracking-widest">Comieeってどんなアプリ？</h3>
        <p class="mt-4 leading-8 text-base">
          Comieeは、誰もがマンガを投稿でき、マンガを楽しむことのできるプラットフォームです。<br>
          気になる作者を応援したり、自分で投稿して収入を得ることもできます。
        </p>
      </div>

      <div class="my-12">
        <h3 id="2" class="text-2xl font-semibold tracking-widest">推奨環境を教えてください</h3>
        <p class="mt-4 leading-8 text-base">
          推奨環境は以下の通りです。<br><br>
          OS<br>
          ・iPhone,iPad：iOS 13.3以降<br>
          ・Windows：Windows 8.1以降<br>
          ・Mac：Mac OS 10.13以降<br><br>
          ブラウザ<br>
          ・Chrome：最新版<br>
          ・Safari：最新版<br>
          ・Microsoft Edge：最新版<br>
          ・Firefox：最新版
        </p>
      </div>

      <div class="my-12">
        <h3 id="3" class="text-2xl font-semibold tracking-widest">会員登録（アカウント作成）やログインは必須ですか？</h3>
        <p class="mt-4 leading-8 text-base">
          必須ではありません。会員登録やログインをしなくても、作品を読むことはできます。<br>
          ただしその場合、以下の機能が使えません。<br><br>
          ・作品への「いいね！」<br>
          ・作者の「フォロー」<br>
          ・作品の「お気に入り」登録<br>
          ・作品へのコメント<br>
          ・コメントへのリプライ<br>
          ・作品の投稿<br>
          ・有料作品の購入<br>
        </p>
      </div>

      <div class="my-12">
        <h3 id="4" class="text-2xl font-semibold tracking-widest">無料で利用できますか？</h3>
        <p class="mt-4 leading-8 text-base">
          有料作品の閲覧以外は、無料で利用できます。
        </p>
      </div>
    </div>
  </div>

  @include('atoms._footer')
@endsection
