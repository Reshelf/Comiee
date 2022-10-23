@extends('app')

@section('title', 'その他 - 読者の方からのご質問')

@section('content')
    @include('_patials._help_nav')

    <div class="w-full flex">
        <div class="w-[30%] bg-f8 dark:bg-dark p-8 flex flex-col items-end">
            @include('others.faq.atoms.left_nav')
        </div>
        <div class="w-[70%] py-8 pl-20 pr-48">
            <h2 class="text-3xl font-semibold tracking-widest">その他</h2>
            <span class="inline-block text-xs mt-3">2022/10/18</span>

            <div class="mb-16 mt-8">
                <div class="flex flex-col text-primary mt-2">
                    <a href="#1" class="my-2">・「いいね！」とは何ですか？</a>
                    <a href="#2" class="my-2">・「フォロー」「お気に入り」とは何ですか？</a>
                    <a href="#3" class="my-2">・利用規約や著作権法に違反していると思われる作品を見つけました</a>
                    <a href="#4" class="my-2">・利用規約に違反していると思われるコメントを見つけました</a>
                    <a href="#5" class="my-2">・自分のコメント/リプライを削除したいです</a>
                    <a href="#6" class="my-2">・自分のコメント/リプライが消されてしまいました</a>
                </div>
            </div>

            <div class="my-16">
                <h3 id="1" class="text-2xl font-semibold tracking-widest">「いいね！」とは何ですか？</h3>
                <p class="mt-4 leading-8">
                    「面白い」と思った作品を評価できる機能です。作品の「いいね！」が増えることで、ランキングに反映されます。作者への応援にもなります。
                </p>
            </div>

            <div class="my-16">
                <h3 id="2" class="text-2xl font-semibold tracking-widest">
                    「フォロー」「お気に入り」とは何ですか？
                </h3>
                <p class="mt-4 leading-8">
                    気に入った作者を「フォロー」、気に入った作品を「お気に入り」することで、マイページに追加され、あとから探しやすくなります。<br>
                    ※「フォロー」「お気に入り」するにはログインが必要となります。
                </p>
            </div>

            <div class="my-16">
                <h3 id="3" class="text-2xl font-semibold tracking-widest">利用規約や著作権法に違反していると思われる作品を見つけました</h3>
                <p class="mt-4 leading-8">
                    「お問い合わせ」画面から通報をお願いします。
                </p>
            </div>


            <div class="my-16">
                <h3 id="4" class="text-2xl font-semibold tracking-widest">利用規約に違反していると思われるコメントを見つけました</h3>
                <p class="mt-4 leading-8">
                    の「通報」から通報をお願いします。
                </p>
            </div>

            <div class="my-16">
                <h3 id="5" class="text-2xl font-semibold tracking-widest">自分のコメント/リプライを削除したいです
                </h3>
                <p class="mt-4 leading-8">

                </p>
            </div>

            <div class="my-16">
                <h3 id="6" class="text-2xl font-semibold tracking-widest">自分のコメント/リプライが消されてしまいました</h3>
                <p class="mt-4 leading-8">
                    利用規約に違反していたり、作者や読者からの一定の通報があった場合、削除されることがあります。
                </p>
            </div>

        </div>
    </div>

    @include('_patials._footer')
@endsection
