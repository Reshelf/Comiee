@extends('app')

@section('title', '作品の投稿について - 作者の方からよくあるご質問')

@section('content')
    @include('atoms._help_nav')

    <div class="w-full flex">
        <div class="w-[30%] bg-f8 dark:bg-dark p-8 flex flex-col items-end">
            @include('others.faq.atoms.left_nav')
        </div>
        <div class="w-[70%] py-8 pl-20 pr-48">
            <h2 class="text-3xl font-semibold tracking-widest">作品の投稿について</h2>
            <span class="inline-block text-xs mt-3">2022/10/18</span>

            <div class="my-16">
                アカウントの作成やログインに関するご質問をまとめました。

                <div class="flex flex-col text-primary mt-2">
                    <a href="#1" class="my-2">・作品の投稿はどこからできますか？</a>
                    <a href="#2" class="my-2">・投稿した作品を後から編集することはできますか？</a>
                    <a href="#3" class="my-2">・投稿した作品を後から削除することはできますか？</a>
                    <a href="#4" class="my-2">・投稿した作品の公開を一時的に停止したり、停止したのちに再公開することはできますか？</a>
                    <a href="#5" class="my-2">・自分をフォローしてくれている読者にのみ作品を公開したり、購入可能にさせることはできますか？</a>
                </div>
            </div>

            <div class="my-16">
                <h3 id="1" class="text-2xl font-semibold tracking-widest">作品の投稿はどこからできますか？</h3>
                <p class="mt-4 leading-8">
                </p>
            </div>

            <div class="my-16">
                <h3 id="2" class="text-2xl font-semibold tracking-widest">
                    投稿した作品を後から編集することはできますか？</h3>
                <p class="mt-4 leading-8">
                </p>
            </div>

            <div class="my-16">
                <h3 id="3" class="text-2xl font-semibold tracking-widest">投稿した作品を後から削除することはできますか？</h3>
                <p class="mt-4 leading-8">
                </p>
            </div>

            <div class="my-16">
                <h3 id="4" class="text-2xl font-semibold tracking-widest">投稿した作品の公開を一時的に停止したり、停止したのちに再公開することはできますか？
                </h3>
                <p class="mt-4 leading-8">
                </p>
            </div>


            <div class="my-16">
                <h3 id="5" class="text-2xl font-semibold tracking-widest">
                    自分をフォローしてくれている読者にのみ作品を公開したり、購入可能にさせることはできますか？</h3>
                <p class="mt-4 leading-8">
                </p>
            </div>

        </div>
    </div>

    @include('atoms._footer')
@endsection
