@extends('app')

@section('title', 'ポイントや作品の購入について - 読者の方からのご質問')

@section('description')
    <meta name="description" itemprop="description" content="ご利用ガイドのポイントや作品の購入についてのページです。">
    <meta property="og:description" content="ご利用ガイドのポイントや作品の購入についてのページです。">
    <meta name="twitter:description" content="ご利用ガイドのポイントや作品の購入についてのページです。">
@endsection

@section('content')
    @include('atoms._help_nav')

    <div class="w-full flex flex-col md:flex-row">
        <div class="w-full md:w-[30%] bg-f8 dark:bg-dark
p-8 flex flex-col items-end">
            @include('others.faq.atoms.left_nav')
        </div>
        <div class="w-full md:w-[70%] p-8 md:py-8 md:pl-20 md:pr-48">
            <h2 class="text-3xl font-semibold tracking-widest">ポイントや作品の購入について</h2>
            <span class="inline-block text-xs mt-3">2022/10/18</span>

            <div class="my-16">
                アカウントの作成やログインに関するご質問をまとめました。

                <div class="flex flex-col text-primary mt-2">
                    <a href="#1" class="my-2">・ポイントを購入する際の支払い方法には何がありますか？</a>
                    <a href="#2" class="my-2">・誤って多くポイントを購入してしまった場合、ポイントを返還して返金してもらうことはできますか？</a>
                    <a href="#3" class="my-2">・ポイントに有効期限はありますか？</a>
                    <a href="#4" class="my-2">・アカウントを削除した場合、所持していたポイントはどうなりますか？</a>
                    <a href="#5" class="my-2">・ポイント以外で作品を購入することはできますか？</a>
                    <a href="#6" class="my-2">・誤って作品を購入してしまった場合、キャンセルして返金してもらうことはできますか？</a>
                    <a href="#7" class="my-2">・アカウントを削除した場合、購入済みの作品はどうなりますか？</a>
                </div>
            </div>

            <div class="my-16">
                <h3 id="1" class="text-2xl font-semibold tracking-widest">ポイントを購入する際の支払い方法には何がありますか？</h3>
                <p class="mt-4 leading-8">
                </p>
            </div>

            <div class="my-16">
                <h3 id="2" class="text-2xl font-semibold tracking-widest">
                    誤って多くポイントを購入してしまった場合、ポイントを返還して返金してもらうことはできますか？</h3>
                <p class="mt-4 leading-8">
                    サービスの特性上、返金はできません。ご確認のうえご購入をお願いいたします。
                </p>
            </div>

            <div class="my-16">
                <h3 id="3" class="text-2xl font-semibold tracking-widest">ポイントに有効期限はありますか？</h3>
                <p class="mt-4 leading-8">
                    ポイントの有効期限は購入から6ヶ月間です。
                </p>
            </div>

            <div class="my-16">
                <h3 id="4" class="text-2xl font-semibold tracking-widest">アカウントを削除した場合、所持していたポイントはどうなりますか？</h3>
                <p class="mt-4 leading-8">
                    所持していたポイントも消去されます。ご注意ください。
                </p>
            </div>


            <div class="my-16">
                <h3 id="5" class="text-2xl font-semibold tracking-widest">ポイント以外で作品を購入することはできますか？</h3>
                <p class="mt-4 leading-8">
                    できません。
                </p>
            </div>

            <div class="my-16">
                <h3 id="6" class="text-2xl font-semibold tracking-widest">誤って作品を購入してしまった場合、キャンセルして返金してもらうことはできますか？
                </h3>
                <p class="mt-4 leading-8">
                    サービスの特性上、返金はできません。ご確認の上ご購入をお願いいたします。
                </p>
            </div>

            <div class="my-16">
                <h3 id="7" class="text-2xl font-semibold tracking-widest">アカウントを削除した場合、購入済みの作品はどうなりますか？</h3>
                <p class="mt-4 leading-8">
                    購入済みの作品も読めなくなります。ご注意ください。
                </p>
            </div>

        </div>
    </div>

    @include('atoms._footer')
@endsection
