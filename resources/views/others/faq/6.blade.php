@extends('app')

@section('title', '作品の収益化について - 作者の方からよくあるご質問 | Starbooks')

@section('content')
    @include('_patials._help_nav')

    <div class="w-full flex">
        <div class="w-[30%] bg-f8 dark:bg-dark p-8 flex flex-col items-end">
            @include('others.faq.atoms.left_nav')
        </div>
        <div class="w-[70%] py-8 pl-20 pr-48">
            <h2 class="text-3xl font-semibold tracking-widest">作品の収益化について</h2>
            <span class="inline-block text-xs mt-3">2022/10/18</span>

            <div class="my-16">
                アカウントの作成やログインに関するご質問をまとめました。

                <div class="flex flex-col text-primary mt-2">
                    <a href="#1" class="my-2">・収益化の条件を教えてください</a>
                    <a href="#2" class="my-2">・条件を達成すれば自動で収益化されますか？それとも申請が必要ですか？</a>
                    <a href="#3" class="my-2">・一度収益化を達成すれば、無料に戻ることはありませんか？</a>
                    <a href="#4" class="my-2">・作品の売上は全て作者のものになりますか？</a>
                    <a href="#5" class="my-2">・作品の値段を作者側で変更することはできますか？無料にしたりできますか？</a>
                </div>
            </div>

            <div class="my-16">
                <h3 id="1" class="text-2xl font-semibold tracking-widest">収益化の条件を教えてください</h3>
                <p class="mt-4 leading-8">
                </p>
            </div>

            <div class="my-16">
                <h3 id="2" class="text-2xl font-semibold tracking-widest">条件を達成すれば自動で収益化されますか？それとも申請が必要ですか？</h3>
                <p class="mt-4 leading-8">
                    条件達成で、自動的に作品が有料になります。申請は必要ありません。
                </p>
            </div>

            <div class="my-16">
                <h3 id="3" class="text-2xl font-semibold tracking-widest">一度収益化を達成すれば、無料に戻ることはありませんか？</h3>
                <p class="mt-4 leading-8">
                    2つの収益化条件を下回れば、作品は無料に戻ります。
                </p>
            </div>

            <div class="my-16">
                <h3 id="4" class="text-2xl font-semibold tracking-widest">作品の売上は全て作者のものになりますか？
                </h3>
                <p class="mt-4 leading-8">
                    （売上–支払い手数料※）✖️70%＝作者の収入になります。詳しくはこちらをご覧ください。<br>
                    ※支払い手数料は、売上金額の3.6%です。
                </p>
            </div>


            <div class="my-16">
                <h3 id="5" class="text-2xl font-semibold tracking-widest">作品の値段を作者側で変更することはできますか？無料にしたりできますか？</h3>
                <p class="mt-4 leading-8">
                </p>
            </div>

        </div>
    </div>

    @include('_patials._footer')
@endsection
