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
            <ul class="tabMenu scroll-none sticky top-0 lg:h-[300px]">
              <h3 class="text-2xl font-semibold py-4 hidden lg:block">{{ __('設定') }}</h3>
              <a href="#mail-notification">{{ __('通知設定') }}</a>
              <a href="#site-display">{{ __('表示設定') }}</a>
              <a href="#earnings">{{ __('収益の受け取り') }}</a>
              <a href="#account-delete">{{ __('アカウント管理') }}</a>
            </ul>
            <div class="tabContents">
              <div class="pt-4 pb-12 border-b border-ccc" id="mail-notification">
                <form method="POST"
                  action="{{ route('users.settings.update', [
                      'lang' => app()->getLocale(),
                      'name' => $user->name,
                      'username' => $user->username,
                  ]) }}"
                  enctype="multipart/form-data" onsubmit="submit_btn()">
                  @csrf
                  @method('PATCH')

                  <h3 class="mb-8 mt-4 text-base font-semibold">
                    {{ __('フォロー') }}</h3>
                  <label class="light-checkbox mt-8">
                    <input type="checkbox" name="m1" value="m1" @if ($user->m_notice_1 === 1) checked @endif
                      class="light-checkbox-Input">
                    <span class="light-checkbox-DummyInput">
                      <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <span class="light-checkbox-LabelText">{{ __('あなたがフォローしている作者が作品を投稿したときに通知をします') }}</span>
                  </label>

                  <label class="light-checkbox mt-8">
                    <input type="checkbox" name="m2" value="m2" @if ($user->m_notice_2 === 1) checked @endif
                      class="light-checkbox-Input">
                    <span class="light-checkbox-DummyInput">
                      <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <span class="light-checkbox-LabelText">{{ __('あなたがユーザーにフォローされたときに通知をします') }}</span>
                  </label>

                  <h3 class="my-8 text-base font-semibold">{{ __('お気に入り') }}</h3>
                  <label class="light-checkbox">
                    <input type="checkbox" name="m3" value="m3" @if ($user->m_notice_3 === 1) checked @endif
                      class="light-checkbox-Input">
                    <span class="light-checkbox-DummyInput">
                      <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <span class="light-checkbox-LabelText">{{ __('あなたの作品がお気に入りに登録されたら通知をします') }}</span>
                  </label>
                  <label class="light-checkbox mt-8">
                    <input type="checkbox" name="m4" value="m4" @if ($user->m_notice_4 === 1) checked @endif
                      class="light-checkbox-Input">
                    <span class="light-checkbox-DummyInput">
                      <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <span class="light-checkbox-LabelText">{{ __('あなたのお気に入り作品の新着エピソードが公開されたときに通知をします') }}</span>
                  </label>

                  <h3 class="my-8 text-base font-semibold">{{ __('購入') }}</h3>

                  <label class="light-checkbox mt-8">
                    <input type="checkbox" name="m5" value="m5" @if ($user->m_notice_5 === 1) checked @endif
                      class="light-checkbox-Input">
                    <span class="light-checkbox-DummyInput">
                      <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                        <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round" />
                      </svg>
                    </span>
                    <span class="light-checkbox-LabelText">{{ __('あなたの作品エピソードが購入されたときに通知をします') }}</span>
                  </label>

                  <h3 class="my-8 text-base font-semibold">NEWS</h3>

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
                    <button type="submit" class="submit_btn3 btn-primary">
                      {{ __('更新する') }}
                      <span class="load loading"></span>
                    </button>
                  </div>
                </form>
              </div>
              <div class="pt-4 pb-12 border-b border-ccc" id="site-display">

                <div class="mt-4">
                  <h3 class="text-base font-semibold">{{ __('表示言語') }}</h3>
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

                <div class="my-8">
                  <h3 class="text-base font-semibold">{{ __('外観') }}</h3>
                  <div class="mt-4">
                    <theme-toggle :one='@json($dark)' :two='@json($light)'></theme-toggle>
                  </div>
                </div>
              </div>
              <div class="pt-4 pb-12 border-b border-ccc" id="earnings">
                <div class="mt-4 mb-8">
                  <h3 class="text-base font-semibold">{{ __('収益受け取りの準備') }}</h3>
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

                  <h3 class="text-base font-semibold mt-12">{{ __('収益について') }}</h3>
                  <div class="mt-4">
                    {{ __('日本時間の毎週金曜日0時に、4営業日前までに購入処理が完了した分の売上が入金されます。') }}<br>
                    詳しくは <a href="/{{ app()->getLocale() . '/terms_of_service' . '#sales_and_author_profit' }}"
                      class="text-primary">こちら</a>
                  </div>
                </div>
              </div>
              <div class="pt-4 pb-12" id="account-delete">
                <div class="mt-4 mb-8">
                  <h3 class="text-base font-semibold">{{ __('アカウントの削除') }}</h3>
                  <div class="mt-6">
                    <div class="relative inline-block">
                      <a href="">
                        <button class="btn-primary">
                          {{ __('アカウントを削除する') }}
                        </button>
                      </a>
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
