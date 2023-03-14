@extends('app')

@section('title', __('設定'))

@php
  $dark = __('ダークモードにする');
  $light = __('ライトモードにする');
@endphp

@section('content')
  @include('atoms._nav', ['tab' => 0])

  <div class="mx-4 lg:mx-0">
    @include('atoms._error_card_list')
    @include('atoms.success')
  </div>
  @if (Auth::id() === $user->id)
    <div class="flex max-w-6xl w-full mx-auto px-6 md:px-0 justify-center mb-8">
      <div class="w-full lg:mt-4 lg:mx-12">
        <h3 class="text-2xl font-semibold py-4 block lg:hidden">{{ __('設定') }}</h3>
        <div class="w-full lg:my-4 flex">
          <div class="setting-tab">
            <ul class="tabMenu scroll-none sticky top-0 lg:h-[400px] lg:min-w-[200px]">
              <h3 class="text-2xl dark:text-f5 font-semibold py-4 hidden lg:block">{{ __('設定') }}</h3>

              <a href="#mail-notification"
                class="m-2 lg:m-0 hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg">
                <svg width="22" height="22" class="mr-4 hidden lg:block" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M17 20.5H7C4 20.5 2 19 2 15.5V8.5C2 5 4 3.5 7 3.5H17C20 3.5 22 5 22 8.5V15.5C22 19 20 20.5 17 20.5Z"
                    stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                    stroke-linejoin="round" />
                  <path d="M17 9L13.87 11.5C12.84 12.32 11.15 12.32 10.12 11.5L7 9" stroke="currentColor"
                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                {{ __('メール通知') }}
              </a>
              <a href="#site-display"
                class="m-2 lg:m-0 hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg">
                <svg width="22" height="22" class="mr-4 hidden lg:block" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M6.44 2H17.55C21.11 2 22 2.89 22 6.44V12.77C22 16.33 21.11 17.21 17.56 17.21H6.44C2.89 17.22 2 16.33 2 12.78V6.44C2 2.89 2.89 2 6.44 2Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M12 17.22V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                  <path d="M2 13H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                  <path d="M7.5 22H16.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
                {{ __('外観') }}
              </a>
              <a href="#site-lang"
                class="m-2 lg:m-0 hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg">
                <svg width="22" height="22" class="mr-4 hidden lg:block" viewBox="0 0 25 24" fill="none">
                  <path d="M16.9915 8.95996H7.01147" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                  <path d="M12.0015 7.28003V8.96002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                  <path d="M14.5015 8.93994C14.5015 13.2399 11.1415 16.7199 7.00146 16.7199" stroke="currentColor"
                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M17.0015 16.72C15.2015 16.72 13.6015 15.76 12.4515 14.25" stroke="currentColor"
                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path
                    d="M9.00146 22H15.0015C20.0015 22 22.0015 20 22.0015 15V9C22.0015 4 20.0015 2 15.0015 2H9.00146C4.00146 2 2.00146 4 2.00146 9V15C2.00146 20 4.00146 22 9.00146 22Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                {{ __('表示言語') }}
              </a>
              <a href="#contract"
                class="m-2 lg:m-0 hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg">
                <svg width="22" height="22" class="mr-4 hidden lg:block" viewBox="0 0 24 24" fill="none">
                  <path d="M16 2H8C4 2 2 4 2 8V21C2 21.55 2.45 22 3 22H16C20 22 22 20 22 16V8C22 4 20 2 16 2Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M7 9.5H17" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                    stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M7 14.5H14" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                    stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                {{ __('出版契約について') }}
              </a>
              <a href="#earnings"
                class="m-2 lg:m-0 hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg">
                <svg width="22" height="22" class="mr-4 hidden lg:block" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M8.67236 14.3298C8.67236 15.6198 9.66236 16.6598 10.8924 16.6598H13.4024C14.4724 16.6598 15.3424 15.7498 15.3424 14.6298C15.3424 13.4098 14.8124 12.9798 14.0224 12.6998L9.99236 11.2998C9.20236 11.0198 8.67236 10.5898 8.67236 9.36984C8.67236 8.24984 9.54236 7.33984 10.6124 7.33984H13.1224C14.3524 7.33984 15.3424 8.37984 15.3424 9.66984"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M12.0005 6V18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                  <path
                    d="M15.0005 22H9.00049C4.00049 22 2.00049 20 2.00049 15V9C2.00049 4 4.00049 2 9.00049 2H15.0005C20.0005 2 22.0005 4 22.0005 9V15C22.0005 20 20.0005 22 15.0005 22Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                {{ __('収益の受け取り') }}
              </a>
              <a href="#account-delete"
                class="m-2 lg:m-0 hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg">
                <svg width="22" height="22" class="mr-4 hidden lg:block" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M8.92993 2L8.95993 3.53003C8.97993 4.34003 9.64993 5 10.4599 5H13.4799C14.3099 5 14.9799 4.32 14.9799 3.5V2"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M17 17L15 19L17 21" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                    stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M20 17L22 19L20 21" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"
                    stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M13 22H8C4.5 22 3 20 3 17V7C3 4 4.5 2 8 2H16C19.5 2 21 4 21 7V14" stroke="currentColor"
                    stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                {{ __('アカウント管理') }}
              </a>
            </ul>

            <div class="tabContents">

              {{-- メール通知 --}}
              <div class="pt-4 pb-12 border-b border-[#dadce0]" id="mail-notification">
                <form method="POST"
                  action="{{ route('users.settings.update', [
                      'lang' => app()->getLocale(),
                      'name' => $user->name,
                      'username' => $user->username,
                  ]) }}"
                  enctype="multipart/form-data" onsubmit="submit_btn()">
                  @csrf
                  @method('PATCH')

                  <h3 class="mb-8 mt-4 text-base dark:text-ddd font-semibold">
                    {{ __('フォロー') }}</h3>
                  <label class="light-checkbox mt-8">
                    <input type="checkbox" name="m1" value="m1"
                      @if ($user->m_notice_1 === 1) checked @endif class="light-checkbox-Input">
                    <span class="light-checkbox-DummyInput">
                      <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <span class="light-checkbox-LabelText">{{ __('あなたがフォローしている作者が作品を投稿したときに通知をします') }}</span>
                  </label>

                  <label class="light-checkbox mt-8">
                    <input type="checkbox" name="m2" value="m2"
                      @if ($user->m_notice_2 === 1) checked @endif class="light-checkbox-Input">
                    <span class="light-checkbox-DummyInput">
                      <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <span class="light-checkbox-LabelText">{{ __('あなたがユーザーにフォローされたときに通知をします') }}</span>
                  </label>

                  <h3 class="my-8 text-base dark:text-ddd font-semibold">{{ __('お気に入り') }}</h3>
                  <label class="light-checkbox">
                    <input type="checkbox" name="m3" value="m3"
                      @if ($user->m_notice_3 === 1) checked @endif class="light-checkbox-Input">
                    <span class="light-checkbox-DummyInput">
                      <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <span class="light-checkbox-LabelText">{{ __('あなたの作品がお気に入りに登録されたら通知をします') }}</span>
                  </label>
                  <label class="light-checkbox mt-8">
                    <input type="checkbox" name="m4" value="m4"
                      @if ($user->m_notice_4 === 1) checked @endif class="light-checkbox-Input">
                    <span class="light-checkbox-DummyInput">
                      <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <span class="light-checkbox-LabelText">{{ __('あなたのお気に入り作品の新着エピソードが公開されたときに通知をします') }}</span>
                  </label>

                  <h3 class="my-8 text-base dark:text-ddd font-semibold">{{ __('購入') }}</h3>

                  <label class="light-checkbox mt-8">
                    <input type="checkbox" name="m5" value="m5"
                      @if ($user->m_notice_5 === 1) checked @endif class="light-checkbox-Input">
                    <span class="light-checkbox-DummyInput">
                      <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <span class="light-checkbox-LabelText">{{ __('あなたの作品エピソードが購入されたときに通知をします') }}</span>
                  </label>

                  <h3 class="my-8 text-base dark:text-ddd font-semibold">NEWS</h3>

                  <label class="light-checkbox mt-8">
                    <input type="checkbox" name="m6" value="m6"
                      @if ($user->m_notice_6 === 1) checked @endif class="light-checkbox-Input">
                    <span class="light-checkbox-DummyInput">
                      <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <span class="light-checkbox-LabelText">{{ __('Comieeからのニュースやお得な情報を受け取ります') }}</span>
                  </label>
                  <div class="relative inline-block mt-12">
                    <button type="submit" class="submit_btn3 btn-border">
                      {{ __('更新する') }}
                      <span class="load loading"></span>
                    </button>
                  </div>
                </form>
              </div>

              {{-- 外観 --}}
              <div class="pt-4 pb-12 border-b border-[#dadce0]" id="site-display">
                <div class="my-4">
                  <h3 class="text-base dark:text-ddd font-semibold">{{ __('外観') }}</h3>
                  <div class="mt-4">
                    <theme-toggle :one='@json($dark)' :two='@json($light)'></theme-toggle>
                  </div>
                </div>
              </div>

              {{-- 表示言語 --}}
              <div class="pt-4 pb-12 border-b border-[#dadce0]" id="site-lang">
                <div class="my-4">
                  <h3 class="text-base dark:text-ddd font-semibold">{{ __('表示言語') }}</h3>
                  <div class="mt-4">
                    <div class="mb-4">
                      <span class="mr-4">{{ __('現在の言語') }} : </span>
                      @if (App::getLocale() == 'ja')
                        {{ __('日本語') }}
                      @elseif(App::getLocale() == 'en')
                        {{ __('英語') }}
                      @elseif(App::getLocale() == 'tw')
                        {{ __('繁体字') }}
                      @elseif(App::getLocale() == 'cn')
                        {{ __('簡体字') }}
                      @elseif(App::getLocale() == 'es')
                        {{ __('スペイン語') }}
                      @elseif(App::getLocale() == 'fr')
                        {{ __('フランス語') }}
                      @elseif(App::getLocale() == 'it')
                        {{ __('イタリア語') }}
                      @elseif(App::getLocale() == 'id')
                        {{ __('インドネシア語') }}
                      @elseif(App::getLocale() == 'th')
                        {{ __('タイ語') }}
                      @elseif(App::getLocale() == 'ko')
                        {{ __('韓国語') }}
                      @elseif(App::getLocale() == 'de')
                        {{ __('ドイツ語') }}
                      @endif
                    </div>
                    <form action="{{ route('change.lang') }}" method="post">
                      @csrf
                      <div class="filters flex flex-wrap">
                        <input type="radio" name="lang" class="visually-hidden" id="ja" value="ja"
                          @if (App::getLocale() == 'ja') checked @endif />
                        <label for="ja" class="mb-4 mr-4">{{ __('日本語') }}</label>
                        <input type="radio" name="lang" class="visually-hidden" id="en" value="en"
                          @if (App::getLocale() == 'en') checked @endif />
                        <label for="en" class="mb-4 mr-4">{{ __('英語') }}</label>
                        <input type="radio" name="lang" class="visually-hidden" id="tw" value="tw"
                          @if (App::getLocale() == 'tw') checked @endif />
                        <label for="tw" class="mb-4 mr-4">{{ __('繁体字') }}</label>
                        <input type="radio" name="lang" class="visually-hidden" id="cn" value="cn"
                          @if (App::getLocale() == 'cn') checked @endif />
                        <label for="cn" class="mb-4 mr-4">{{ __('簡体字') }}</label>
                        <input type="radio" name="lang" class="visually-hidden" id="es" value="es"
                          @if (App::getLocale() == 'es') checked @endif />
                        <label for="es" class="mb-4 mr-4">{{ __('スペイン語') }}</label>
                        <input type="radio" name="lang" class="visually-hidden" id="fr" value="fr"
                          @if (App::getLocale() == 'fr') checked @endif />
                        <label for="fr" class="mb-4 mr-4">{{ __('フランス語') }}</label>
                        <input type="radio" name="lang" class="visually-hidden" id="it" value="it"
                          @if (App::getLocale() == 'it') checked @endif />
                        <label for="it" class="mb-4 mr-4">{{ __('イタリア語') }}</label>
                        <input type="radio" name="lang" class="visually-hidden" id="id" value="id"
                          @if (App::getLocale() == 'id') checked @endif />
                        <label for="id" class="mb-4 mr-4">{{ __('インドネシア語') }}</label>
                        <input type="radio" name="lang" class="visually-hidden" id="th" value="th"
                          @if (App::getLocale() == 'th') checked @endif />
                        <label for="th" class="mb-4 mr-4">{{ __('タイ語') }}</label>
                        <input type="radio" name="lang" class="visually-hidden" id="ko" value="ko"
                          @if (App::getLocale() == 'ko') checked @endif />
                        <label for="ko" class="mb-4 mr-4">{{ __('韓国語') }}</label>
                        <input type="radio" name="lang" class="visually-hidden" id="de" value="de"
                          @if (App::getLocale() == 'de') checked @endif />
                        <label for="de" class="mb-4 mr-4">{{ __('ドイツ語') }}</label>
                      </div>
                      <button type="submit" class="btn-border mt-6">{{ __('変更する') }}</button>
                    </form>

                  </div>
                </div>
              </div>

              {{-- 出版契約 --}}
              <div class="pt-4 pb-12 border-b border-[#dadce0]" id="contract">
                <div class="my-4">
                  <h3 class="text-base dark:text-ddd font-semibold">{{ __('出版契約') }}</h3>
                  <div class="my-4">
                    {{ __('作品を有料化するには、作品毎に当サービスと出版契約書を締結する必要があります。') }}<br>
                    {{ __('以下のボタンから契約書をダウンロードをして記入の上、この作品の契約書を送信してください。') }} <br>
                    <a href="https://comiee.s3.ap-northeast-1.amazonaws.com/app/system/work_contract.pdf"
                      target="_blank" rel="noopener noreferrer"
                      class="btn-border inline-block mt-4">{{ __('契約書をダウンロード') }}</a><br>
                    <a href="https://docs.google.com/forms/d/1BJP0Z7yXIi50QcMRd4cTEOLAEvc90fIjGJhzvuOXQUs/edit"
                      target="_blank" rel="noopener noreferrer"
                      class="btn-border inline-block mt-4">{{ __('出版契約書を送信する') }}</a>
                  </div>
                  <div class="flex mt-8">
                    <div class="pr-12 font-semibold">
                      契約中の作品
                    </div>
                    <div class="flex flex-col ">
                      @foreach ($user->books as $book)
                        @if ($book->is_contracted)
                          <a href="{{ route('book.show', ['lang' => app()->getLocale(), 'book_id' => $book->id]) }}"
                            class="hover:text-primary mb-4">
                            {{ $book->title }}
                          </a>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>


              {{-- 収益受け取りの準備 --}}
              <div class="pt-4 pb-12 border-b border-[#dadce0]" id="earnings">
                <div class="mt-4 mb-8">
                  <h3 class="text-base dark:text-ddd font-semibold">{{ __('収益受け取りの準備') }}</h3>
                  <div class="mt-6">
                    @if (empty(Auth::user()->stripe_user_id))
                      <p class="mb-6">
                        {{ __('Stripeアカウントを連携して受取設定を完了させましょう。') }}
                      </p>
                      <div class="relative inline-block">
                        <a onclick="stripe_connectbtn()"
                          href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id={{ config('app.stripe_connect_client_id') }}&scope=read_write&redirect_uri={{ config('app.top_url') }}/connect">
                          <button class="stripe_connectbtn btn-primary">
                            {{ __('Stripeアカウントを連携する') }}
                            <span class="load loading"></span>
                          </button>
                        </a>
                      </div>
                    @else
                      <div
                        class="text-green bg-green bg-opacity-10 font-semibold rounded p-4 inline-flex items-center max-w-6xl mx-auto">
                        <svg class="mr-2 w-[20px] h-[20px] fill-green" viewBox="0 0 20 20" fill="none">
                          <path
                            d="M10 0C4.49 0 0 4.49 0 10C0 15.51 4.49 20 10 20C15.51 20 20 15.51 20 10C20 4.49 15.51 0 10 0ZM14.78 7.7L9.11 13.37C8.97 13.51 8.78 13.59 8.58 13.59C8.38 13.59 8.19 13.51 8.05 13.37L5.22 10.54C4.93 10.25 4.93 9.77 5.22 9.48C5.51 9.19 5.99 9.19 6.28 9.48L8.58 11.78L13.72 6.64C14.01 6.35 14.49 6.35 14.78 6.64C15.07 6.93 15.07 7.4 14.78 7.7Z" />
                        </svg>
                        {{ __('あなたの収益受取はStripeと連携されています') }}
                      </div>
                    @endif
                  </div>

                  <h3 class="text-base dark:text-ddd font-semibold mt-12">{{ __('収益について') }}</h3>
                  <div class="mt-4">
                    {{ __('日本時間の毎週金曜日0時に、4営業日前までに購入処理が完了した分の売上が入金されます。') }}<br>
                    詳しくは <a href="/{{ app()->getLocale() . '/terms_of_service' . '#sales_and_author_profit' }}"
                      class="text-primary">こちら</a>
                  </div>
                </div>
              </div>

              <div class="pt-4 pb-12" id="account-delete">

                {{-- ログアウト --}}
                <div class="mt-4 mb-8">
                  <h3 class="text-base dark:text-ddd font-semibold">{{ __('アカウントをログアウト') }}</h3>
                  <div class="mt-6">
                    <form id="logout-button" method="POST" action="{{ route('logout', app()->getLocale()) }}">
                      @csrf
                      <button type="submit" class="text-red border borde-red px-4 py-2 rounded-[5px]">
                        {{ __('ログアウトする') }}
                      </button>
                    </form>
                  </div>
                </div>

                {{-- アカウントの削除 --}}
                <div class="mt-4 mb-8">
                  <h3 class="text-base dark:text-ddd font-semibold">{{ __('アカウントの削除') }}</h3>
                  <div class="mt-6">
                    <div class="relative inline-block">
                      <delete-modal>
                        <template #header>
                          {{ __('アカウントを削除する') }}
                        </template>
                        <template #trigger>
                          <button class="text-red border borde-red px-4 py-2 rounded-[5px]">
                            {{ __('アカウントを削除する') }}
                          </button>
                        </template>

                        <form method="POST"
                          action="{{ route('users.delete', ['lang' => app()->getLocale(), 'username' => $user->username]) }}"
                          class="p-2 rounded w-full">
                          @csrf
                          @method('DELETE')
                          <div class="">
                            <p class="mb-4"> {{ __('アカウントを削除すると、次のような影響があります') }}</p>
                            <ul class="mb-8">
                              <li class="mb-2">{{ __('そのアカウントでは、ログインすることもComieeのサービスを利用することも一切できません') }}</li>
                              <li class="mb-2">{{ __('あなたの作品すべてにアクセスできなくなります') }}</li>
                              <li class="">{{ __('これまでに購入した作品を見ることができなくなります') }}</li>
                            </ul>
                          </div>
                          <div class="w-full">
                            <button type="submit"
                              class="bg-red hover:bg-opacity-80 rounded-[5px] text-white py-2 w-full">{{ __('すべてに了承し削除します') }}</button>
                          </div>
                        </form>
                      </delete-modal>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif



  @include('atoms._footer')
@endsection
