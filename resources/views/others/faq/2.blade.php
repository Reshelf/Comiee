@extends('app')

@section('title', '会員登録・ログインについて')

@section('content')
    @include('atoms._help_nav')

    <div class="w-full flex">
        <div class="w-[30%] bg-f8 dark:bg-dark p-8 flex flex-col items-end">
            @include('others.faq.atoms.left_nav')
        </div>
        <div class="w-[70%] py-8 pl-20 pr-48">
            <h2 class="text-3xl font-semibold tracking-widest">会員登録・ログインについて</h2>
            <span class="inline-block text-xs mt-3">2022/10/17</span>

            <div class="my-16">
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

            <div class="my-16">
                <h3 id="1" class="text-2xl font-semibold tracking-widest">会員登録には何が必要ですか？</h3>
                <p class="mt-4 leading-8">
                    メールアドレス、電話番号のご用意をお願いします。<br>
                    年齢制限の確認のため生年月日の登録もお願いしています。
                </p>
            </div>

            <div class="my-16">
                <h3 id="2" class="text-2xl font-semibold tracking-widest">ログインができません</h3>
                <p class="mt-4 leading-8">
                    自力で乗り越えてください
                </p>
            </div>

            <div class="my-16">
                <h3 id="3" class="text-2xl font-semibold tracking-widest">パスワードを変えたい</h3>
                <p class="mt-4 leading-8">
                    自力で乗り越えてください
                </p>
            </div>

            <div class="my-16">
                <h3 id="4" class="text-2xl font-semibold tracking-widest">ニックネームは後から変更できますか？</h3>
                <p class="mt-4 leading-8">
                    可能です。
                </p>
            </div>

            <div class="my-16">
                <h3 id="5" class="text-2xl font-semibold tracking-widest">ユーザIDとは何ですか？後から変更できますか？</h3>
                <p class="mt-4 leading-8">
                    可能です。
                </p>
            </div>

            <div class="my-16">
                <h3 id="6" class="text-2xl font-semibold tracking-widest">アカウントを削除したい</h3>
                <p class="mt-4 leading-8">
                    こちらから削除を行えます。
                </p>
            </div>

            <div class="my-16">
                <h3 id="7" class="text-2xl font-semibold tracking-widest">アカウントを削除した後で、復旧はできますか？</h3>
                <p class="mt-4 leading-8">
                    一度削除してしまった場合、復旧はできません。
                </p>
            </div>
        </div>
    </div>

    @include('atoms._footer')
@endsection
