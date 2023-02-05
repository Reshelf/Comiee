@extends('app')

@section('title', 'ご利用ガイド')

@section('description')
  <meta name="description" itemprop="description" content="Comieeのご利用ガイドページです。">
  <meta property="og:description" content="Comieeのご利用ガイドページです。">
  <meta name="twitter:description" content="Comieeのご利用ガイドページです。">
@endsection

@section('content')
  @include('atoms._help_nav')

  {{-- <div class="w-full bg-[#0A2140] bg-opacity-50 h-[110px] flex items-center justify-center">

    </div> --}}
  <div class="w-full bg-f8 dark:bg-dark p-8">
    <div class="max-w-6xl mx-auto">
      <div
        class="bg-white dark:bg-dark-1 p-12 rounded-[5px] border-2 border-transparent hover:text-primary hover:border-primary cursor-pointer">
        <h3 class="tracking-widest text-[16px] font-semibold">Comieeについて</h3>
        <div class="mt-2">初めての方はこちらから</div>
      </div>

      <div class="flex flex-col md:flex-row items-center my-8">
        <a href="{{ route('others.faq', ['lang' => app()->getLocale(), 'number' => 1]) }}"
          class="mr-2 block lg:h-[160px] w-full md:w-1/2 bg-white dark:bg-dark-1 p-12 rounded-[5px] border-2 border-transparent hover:text-primary hover:border-primary cursor-pointer">
          <h3 class="tracking-widest text-[16px] font-semibold">よくあるご質問</h3>
          <div class="mt-2">設定の変更方法など、わからないことがある場合はこちら</div>
        </a>
        <a href="mailto:info@Comiee.one?subject=お問い合わせ"
          class="ml-2 block lg:h-[160px] w-full md:w-1/2 bg-white dark:bg-dark-1 p-12 rounded-[5px] border-2 border-transparent hover:text-primary hover:border-primary cursor-pointer">
          <h3 class="tracking-widest text-[16px] font-semibold">お問い合わせ</h3>
          <div class="mt-2">問題が解消しない場合はこちらから</div>
        </a>
      </div>
    </div>
  </div>

  @include('atoms._footer')
@endsection
