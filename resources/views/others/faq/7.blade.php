@extends('app')

@section('title', 'その他 - 作者の方からよくあるご質問')

@section('description')
  <meta name="description" itemprop="description" content="ご利用ガイドのその他についてのページです。">
  <meta property="og:description" content="ご利用ガイドのその他についてのページです。">
  <meta name="twitter:description" content="ご利用ガイドのその他についてのページです。">
@endsection

@section('content')
  @include('atoms._help_nav')

  <div class="w-full flex flex-col md:flex-row">
    <div class="w-full md:w-[30%] bg-f8 dark:bg-dark
p-8 flex flex-col items-end">
      @include('others.faq.atoms.left_nav')
    </div>
    <div class="w-full md:w-[70%] p-8 md:py-8 md:pl-20 md:pr-48">
      <h2 class="text-3xl font-semibold tracking-widest">その他</h2>
      <span class="inline-block mt-3">2023/1/20</span>

      <div class="my-8 text-base">
        <div class="flex flex-col text-primary mt-2 text-base">
          <a href="#1" class="my-2">・自分の作品を購入してくれた読者にお礼を伝える方法はありますか？</a>
          <a href="#2" class="my-2">・他の作者との合作はできますか？</a>
          <a href="#3" class="my-2">・自分の作品が通報された場合、どうなりますか？</a>
          <a href="#4" class="my-2">・収益化していた自分の作品が通報されて削除された場合、収益はどうなりますか？</a>
          <a href="#5" class="my-2">・他のユーザーに自分の作品を模倣されています</a>
          <a href="#6" class="my-2">・自分の作品に、利用規約に違反していると思われるコメントが書き込まれました</a>
          <a href="#7" class="my-2">・他の出版誌やメディアで連載/掲載している作品を投稿することはできますか？</a>
        </div>
      </div>

      <div class="my-12">
        <h3 id="1" class="text-2xl font-semibold tracking-widest">自分の作品を購入してくれた読者にお礼を伝える方法はありますか？</h3>
        <p class="mt-4 leading-8 text-base">
        </p>
      </div>

      <div class="my-12">
        <h3 id="2" class="text-2xl font-semibold tracking-widest">他の作者との合作はできますか？</h3>
        <p class="mt-4 leading-8 text-base">
          できます。ただし、著作権の帰属や収益の配分については、当事者間で決めていただく必要があります。また、万一トラブルが起きても、Comieeは責任を負いかねます。
        </p>
      </div>

      <div class="my-12">
        <h3 id="3" class="text-2xl font-semibold tracking-widest">自分の作品が通報された場合、どうなりますか？</h3>
        <p class="mt-4 leading-8 text-base">
          著作権法に違反していた場合、★（公開停止・削除？）される可能性があります。
        </p>
      </div>

      <div class="my-12">
        <h3 id="4" class="text-2xl font-semibold tracking-widest">収益化していた自分の作品が通報されて削除された場合、収益はどうなりますか？</h3>
        <p class="mt-4 leading-8 text-base">
          所持していたポイントも消去されます。ご注意ください。
        </p>
      </div>

      <div class="my-12">
        <h3 id="5" class="text-2xl font-semibold tracking-widest">他のユーザーに自分の作品を模倣されています</h3>
        <p class="mt-4 leading-8 text-base">
          「お問い合わせ」画面から通報をお願いします。
        </p>
      </div>

      <div class="my-12">
        <h3 id="6" class="text-2xl font-semibold tracking-widest">自分の作品に、利用規約に違反していると思われるコメントが書き込まれました
        </h3>
        <p class="mt-4 leading-8 text-base">
          「通報」から通報をお願いします。
        </p>
      </div>

      <div class="my-12">
        <h3 id="7" class="text-2xl font-semibold tracking-widest">他の出版誌やメディアで連載/掲載している作品を投稿することはできますか？</h3>
        <p class="mt-4 leading-8 text-base">
          作品が他者の権利を侵害するものでない限り、投稿していただくことに問題はありません。ただし、他の出版誌やメディア、賞での規約については関知しませんので、違反のないことをご確認のうえ投稿してください。
        </p>
      </div>

    </div>
  </div>

  @include('atoms._footer')
@endsection
