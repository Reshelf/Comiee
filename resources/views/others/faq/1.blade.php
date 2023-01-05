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
      <span class="inline-block text-xs mt-3">2022/10/17</span>

      <div class="my-16">
        Comieeの概要やご利用に関するご質問をまとめました。

        <div class="flex flex-col text-primary mt-2">
          <a href="#1" class="my-2">・Comieeってどんなアプリ？</a>
          <a href="#2" class="my-2">・推奨環境を教えてください</a>
          <a href="#3" class="my-2">・会員登録は必須ですか？</a>
          <a href="#4" class="my-2">・無料で利用できますか？</a>
          <a href="#5" class="my-2">・アプリ版とweb版の違いって？</a>
        </div>
      </div>

      <div class="my-16">
        <h3 id="1" class="text-2xl font-semibold tracking-widest">Comieeってどんなアプリ？</h3>
        <p class="mt-4 leading-8">
          Comieeは、誰もがマンガを投稿でき、マンガを楽しむことのできるプラットフォームです。<br>
          気になる作者を応援したり、自分で投稿して収入を得ることもできます。
        </p>
      </div>

      <div class="my-16">
        <h3 id="2" class="text-2xl font-semibold tracking-widest">推奨環境を教えてください</h3>
        <p class="mt-4 leading-8">
          以下の通りです。<br><br>
          【パソコン（ブラウザ）】<br>
          〈Windows〉<br>
          ・OS：Windows10以上<br>
          ・ブラウザ：Chrome最新/Edge最新<br>
          〈Mac OS〉<br>
          ・OS：★ <br>
          ・ブラウザ：Safari最新/Chrome最新<br><br>
          【スマートフォン（アプリ）】<br>
          〈iPhone〉<br>
          ・OS：iOS★以上<br>
          ・ブラウザ：Safari最新/Chrome最新<br>
          〈Android〉<br>
          ・OS：Android★以上<br>
          ・ブラウザ：Chrome最新
        </p>
      </div>

      <div class="my-16">
        <h3 id="3" class="text-2xl font-semibold tracking-widest">会員登録（アカウント作成）やログインは必須ですか？</h3>
        <p class="mt-4 leading-8">
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

      <div class="my-16">
        <h3 id="4" class="text-2xl font-semibold tracking-widest">無料で利用できますか？</h3>
        <p class="mt-4 leading-8">
          有料作品の閲覧以外は、無料で利用できます。
        </p>
      </div>

      <div class="my-16">
        <h3 id="5" class="text-2xl font-semibold tracking-widest">アプリ版とWeb版の違いって？</h3>
        <p class="mt-4 leading-8">
        </p>
      </div>
    </div>
  </div>

  @include('atoms._footer')
@endsection
