@extends('app')

@section('title', 'その他 - 作者の方からよくあるご質問')

@section('content')
    @include('atoms._help_nav')

    <div class="w-full flex">
        <div class="w-[30%] bg-f8 dark:bg-dark p-8 flex flex-col items-end">
            @include('others.faq.atoms.left_nav')
        </div>
        <div class="w-[70%] py-8 pl-20 pr-48">
            <h2 class="text-3xl font-semibold tracking-widest">その他</h2>
            <span class="inline-block text-xs mt-3">2022/10/18</span>

            <div class="my-16">
                <div class="flex flex-col text-primary mt-2">
                    <a href="#1" class="my-2">・自分の作品を購入してくれた読者にお礼を伝える方法はありますか？</a>
                    <a href="#2" class="my-2">・他の作者との合作はできますか？</a>
                    <a href="#3" class="my-2">・自分の作品が通報された場合、どうなりますか？</a>
                    <a href="#4" class="my-2">・収益化していた自分の作品が通報されて削除された場合、収益はどうなりますか？</a>
                    <a href="#5" class="my-2">・他のユーザーに自分の作品を模倣されています</a>
                    <a href="#6" class="my-2">・自分の作品に、利用規約に違反していると思われるコメントが書き込まれました</a>
                    <a href="#7" class="my-2">・他の出版誌やメディアで連載/掲載している作品を投稿することはできますか？</a>
                </div>
            </div>

            <div class="my-16">
                <h3 id="1" class="text-2xl font-semibold tracking-widest">自分の作品を購入してくれた読者にお礼を伝える方法はありますか？</h3>
                <p class="mt-4 leading-8">
                </p>
            </div>

            <div class="my-16">
                <h3 id="2" class="text-2xl font-semibold tracking-widest">他の作者との合作はできますか？</h3>
                <p class="mt-4 leading-8">
                    できます。ただし、著作権の帰属や収益の配分については、当事者間で決めていただく必要があります。また、万一トラブルが起きても、Starbooksは責任を負いかねます。
                </p>
            </div>

            <div class="my-16">
                <h3 id="3" class="text-2xl font-semibold tracking-widest">自分の作品が通報された場合、どうなりますか？</h3>
                <p class="mt-4 leading-8">
                    著作権法に違反していた場合、★（公開停止・削除？）される可能性があります。
                </p>
            </div>

            <div class="my-16">
                <h3 id="4" class="text-2xl font-semibold tracking-widest">収益化していた自分の作品が通報されて削除された場合、収益はどうなりますか？</h3>
                <p class="mt-4 leading-8">
                    所持していたポイントも消去されます。ご注意ください。
                </p>
            </div>

            <div class="my-16">
                <h3 id="5" class="text-2xl font-semibold tracking-widest">他のユーザーに自分の作品を模倣されています</h3>
                <p class="mt-4 leading-8">
                    「お問い合わせ」画面から通報をお願いします。
                </p>
            </div>

            <div class="my-16">
                <h3 id="6" class="text-2xl font-semibold tracking-widest">自分の作品に、利用規約に違反していると思われるコメントが書き込まれました
                </h3>
                <p class="mt-4 leading-8">
                    「通報」から通報をお願いします。
                </p>
            </div>

            <div class="my-16">
                <h3 id="7" class="text-2xl font-semibold tracking-widest">他の出版誌やメディアで連載/掲載している作品を投稿することはできますか？</h3>
                <p class="mt-4 leading-8">
                    作品が他者の権利を侵害するものでない限り、投稿していただくことに問題はありません。ただし、他の出版誌やメディア、賞での規約については関知しませんので、違反のないことをご確認のうえ投稿してください。
                </p>
            </div>

        </div>
    </div>

    @include('atoms._footer')
@endsection
