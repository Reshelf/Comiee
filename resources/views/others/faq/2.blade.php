@extends('app')

@section('title', '会員登録・ログインについて')

@section('description')
  <meta name="description" itemprop="description" content="ご利用ガイドの会員登録・ログインについてのページです。">
  <meta property="og:description" content="ご利用ガイドの会員登録・ログインについてのページです。">
  <meta name="twitter:description" content="ご利用ガイドの会員登録・ログインについてのページです。">
@endsection

@section('content')
  @include('atoms._help_nav')

  <div class="w-full flex flex-col md:flex-row">
    <div class="w-full md:w-[30%] bg-f8 dark:bg-dark
p-8 flex flex-col items-end">
      @include('others.faq.atoms.left_nav')
    </div>
    <div class="w-full md:w-[70%] p-8 md:py-8 md:pl-20 md:pr-48">
      <h2 class="text-3xl font-semibold tracking-widest">会員登録・ログインについて</h2>
      <span class="inline-block mt-3">2022/10/17</span>

      <div class="my-8 text-base">
        アカウントの作成やログインに関するご質問をまとめました。

        <div class="flex flex-col text-primary mt-2">
          <a href="#1" class="my-2">・会員登録には何が必要ですか？</a>
          <a href="#2" class="my-2">・ログインができません</a>
          <a href="#3" class="my-2">・パスワードを変えたい</a>
          <a href="#4" class="my-2">・ニックネームは後から変更できますか？</a>
          <a href="#5" class="my-2">・ユーザIDとは何ですか？後から変更できますか？</a>
          <a href="#6" class="my-2">・アカウントを削除したい</a>
          <a href="#7" class="my-2">・アカウントを削除した後で、復旧はできますか？</a>
        </div>
      </div>

      <div class="my-12">
        <h3 id="1" class="text-2xl font-semibold tracking-widest">会員登録には何が必要ですか？</h3>
        <p class="mt-4 leading-8 text-base">
          メールアドレスと生年月日の入力が必要です。
        </p>
      </div>

      <div class="my-12">
        <h3 id="3" class="text-2xl font-semibold tracking-widest">パスワードを変えたい</h3>
        <p class="mt-4 leading-8 text-base">
          こちらから変更できます。
        </p>
      </div>

      <div class="my-12">
        <h3 id="4" class="text-2xl font-semibold tracking-widest">ニックネームは後から変更できますか？</h3>
        <p class="mt-4 leading-8 text-base">
          はい。マイページでいつでも変更できます。
        </p>
      </div>

      <div class="my-12">
        <h3 id="5" class="text-2xl font-semibold tracking-widest">ユーザIDとは何ですか？後から変更できますか？</h3>
        <p class="mt-4 leading-8 text-base">
          マイページのURLに使われる文字列です。会員登録後、マイページの「設定」からいつでも変更できます。ただし、他のユーザーが使用しているものと同じIDにはできません。
        </p>
      </div>

      <div class="my-12">
        <h3 id="6" class="text-2xl font-semibold tracking-widest">アカウントを削除したい</h3>
        <p class="mt-4 leading-8 text-base">
          こちらから削除を行えます。
        </p>
      </div>

      <div class="my-12">
        <h3 id="7" class="text-2xl font-semibold tracking-widest">アカウントを削除した後で、復旧はできますか？</h3>
        <p class="mt-4 leading-8 text-base">
          一度削除してしまった場合、復旧はできません。
        </p>
      </div>
    </div>
  </div>

  @include('atoms._footer')
@endsection
