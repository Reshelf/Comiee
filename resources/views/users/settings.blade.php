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
    <div class="flex flex-col max-w-6xl w-full mx-auto justify-center mb-8">
      <h3 class="text-2xl px-8 pt-8 pb-2 block lg:hidden">{{ __('設定') }}</h3>
      <div class="w-full lg:my-8 flex">
        <div class="setting-tab">
          <div class="tabMenu hidden lg:block lg:mr-4 scroll-none sticky top-0 lg:h-[400px] lg:min-w-[200px]">
            <h3 class="text-2xl dark:text-f5 py-4 hidden lg:block">{{ __('設定') }}</h3>

            <a href="#mail-notification"
              class="mr-2 mb-2 lg:m-0 hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg">
              <svg width="22" height="22" class="mr-4 hidden lg:block" viewBox="0 0 24 24" fill="none">
                <title>mail</title>
                <path
                  d="M17 20.5H7C4 20.5 2 19 2 15.5V8.5C2 5 4 3.5 7 3.5H17C20 3.5 22 5 22 8.5V15.5C22 19 20 20.5 17 20.5Z"
                  stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                  stroke-linejoin="round" />
                <path d="M17 9L13.87 11.5C12.84 12.32 11.15 12.32 10.12 11.5L7 9" stroke="currentColor" stroke-width="1.5"
                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              {{ __('メール通知') }}
            </a>
            <a href="#site-display"
              class="mr-2 mb-2 lg:m-0 hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg">
              <svg width="22" height="22" class="mr-4 hidden lg:block" viewBox="0 0 24 24" fill="none">
                <title>display</title>
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
              class="mr-2 mb-2 lg:m-0 hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg">
              <svg width="22" height="22" class="mr-4 hidden lg:block" viewBox="0 0 25 24" fill="none">
                <title>lang</title>
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
            <a href="#earnings"
              class="mr-2 mb-2 lg:m-0 hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg">
              <svg width="22" height="22" class="mr-4 hidden lg:block" viewBox="0 0 24 24" fill="none">
                <title>earnings</title>
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
              class="mr-2 mb-2 lg:m-0 hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg">
              <svg width="22" height="22" class="mr-4 hidden lg:block" viewBox="0 0 24 24" fill="none">
                <title>account delete</title>
                <path
                  d="M21.08 8.58003V15.42C21.08 16.54 20.48 17.58 19.51 18.15L13.57 21.58C12.6 22.14 11.4 22.14 10.42 21.58L4.48003 18.15C3.51003 17.59 2.91003 16.55 2.91003 15.42V8.58003C2.91003 7.46003 3.51003 6.41999 4.48003 5.84999L10.42 2.42C11.39 1.86 12.59 1.86 13.57 2.42L19.51 5.84999C20.48 6.41999 21.08 7.45003 21.08 8.58003Z"
                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path
                  d="M12 11.0001C13.2869 11.0001 14.33 9.95687 14.33 8.67004C14.33 7.38322 13.2869 6.34009 12 6.34009C10.7132 6.34009 9.67004 7.38322 9.67004 8.67004C9.67004 9.95687 10.7132 11.0001 12 11.0001Z"
                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16 16.6601C16 14.8601 14.21 13.4001 12 13.4001C9.79 13.4001 8 14.8601 8 16.6601"
                  stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              {{ __('アカウント管理') }}
            </a>
          </div>

          <main class="tabContents">

            {{-- メール通知 --}}
            <div class="p-8 m-4 lg:p-10 lg:mx-0 lg:mb-8 border border-comiee rounded-lg" id="mail-notification">
              <h3 class="dark:text-ddd text-xl mb-8">{{ __('メール通知') }}</h3>
              <form method="POST"
                action="{{ route('users.settings.update', [
                    'name' => $user->name,
                    'username' => $user->username,
                ]) }}"
                enctype="multipart/form-data" onsubmit="submit_btn()">
                @csrf
                @method('PATCH')
                <label class="light-checkbox mt-8">
                  <input type="checkbox" name="m1" value="m1" @if ($user->m_notice_1 === 1) checked @endif
                    class="light-checkbox-Input">
                  <span class="light-checkbox-DummyInput">
                    <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                      <title>checkbox</title>
                      <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                  </span>
                  <span class="light-checkbox-LabelText">{{ __('あなたがフォローしているクリエイターが作品を投稿したときに通知をします') }}</span>
                </label>
                <label class="light-checkbox mt-8">
                  <input type="checkbox" name="m2" value="m2" @if ($user->m_notice_2 === 1) checked @endif
                    class="light-checkbox-Input">
                  <span class="light-checkbox-DummyInput">
                    <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                      <title>checkbox</title>
                      <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                  </span>
                  <span class="light-checkbox-LabelText">{{ __('あなたがユーザーにフォローされたときに通知をします') }}</span>
                </label>
                <label class="light-checkbox mt-8">
                  <input type="checkbox" name="m3" value="m3" @if ($user->m_notice_3 === 1) checked @endif
                    class="light-checkbox-Input">
                  <span class="light-checkbox-DummyInput">
                    <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                      <title>checkbox</title>
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
                      <title>checkbox</title>
                      <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                  </span>
                  <span class="light-checkbox-LabelText">{{ __('あなたのお気に入り作品の新着エピソードが公開されたときに通知をします') }}</span>
                </label>
                <label class="light-checkbox mt-8">
                  <input type="checkbox" name="m5" value="m5" @if ($user->m_notice_5 === 1) checked @endif
                    class="light-checkbox-Input">
                  <span class="light-checkbox-DummyInput">
                    <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                      <title>checkbox</title>
                      <path d="M0.75 3.99998L3.58 6.82998L9.25 1.16998" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                  </span>
                  <span class="light-checkbox-LabelText">{{ __('あなたの作品エピソードが購入されたときに通知をします') }}</span>
                </label>
                <label class="light-checkbox mt-8">
                  <input type="checkbox" name="m6" value="m6" @if ($user->m_notice_6 === 1) checked @endif
                    class="light-checkbox-Input">
                  <span class="light-checkbox-DummyInput">
                    <svg width="10" height="8" class="stroke-white" viewBox="0 0 10 8" fill="none">
                      <title>checkbox</title>
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
            <div class="p-8 m-4 lg:p-10 lg:mx-0 lg:mb-8 border border-comiee rounded-lg" id="site-display">
              <h3 class="text-xl dark:text-ddd">{{ __('外観') }}</h3>
              <div class="mt-4">
                <theme-toggle :one='@json($dark)' :two='@json($light)'></theme-toggle>
              </div>
            </div>

            {{-- 表示言語 --}}
            <div class="p-8 m-4 lg:p-10 lg:mx-0 lg:mb-8 border border-comiee rounded-lg" id="site-lang">
              <h3 class="text-xl dark:text-ddd">{{ __('表示言語') }}</h3>
              <div class="mt-4">
                <div class="mb-4">
                  <span class="mr-4">{{ __('現在の言語') }} : </span>
                  @if (App::getLocale() == 'ja')
                    日本語
                  @elseif(App::getLocale() == 'en')
                    English
                  @elseif(App::getLocale() == 'tw')
                    繁體中文
                  @elseif(App::getLocale() == 'cn')
                    簡体中文
                  @elseif(App::getLocale() == 'es')
                    Español
                  @elseif(App::getLocale() == 'fr')
                    Français
                  @elseif(App::getLocale() == 'it')
                    Italiano
                  @elseif(App::getLocale() == 'id')
                    Bahasa Indonesia
                  @elseif(App::getLocale() == 'th')
                    ภาษาไทย
                  @elseif(App::getLocale() == 'ko')
                    한국어
                  @elseif(App::getLocale() == 'de')
                    Deutsch
                  @elseif(App::getLocale() == 'hi')
                    हिन्दी
                  @elseif(App::getLocale() == 'ar')
                    العربية
                  @elseif(App::getLocale() == 'pt')
                    Português
                  @elseif(App::getLocale() == 'bn')
                    বাংলা
                  @endif
                </div>
                <form action="{{ route('change.lang') }}" method="post">
                  @csrf
                  <div class="filters flex flex-wrap">
                    <input type="radio" name="lang" class="visually-hidden" id="ja" value="ja"
                      @if (App::getLocale() == 'ja') checked @endif />
                    <label for="ja" class="mb-4 mr-4">日本語</label>
                    <input type="radio" name="lang" class="visually-hidden" id="en" value="en"
                      @if (App::getLocale() == 'en') checked @endif />
                    <label for="en" class="mb-4 mr-4">English</label>
                    <input type="radio" name="lang" class="visually-hidden" id="tw" value="tw"
                      @if (App::getLocale() == 'tw') checked @endif />
                    <label for="tw" class="mb-4 mr-4">繁體中文</label>
                    <input type="radio" name="lang" class="visually-hidden" id="cn" value="cn"
                      @if (App::getLocale() == 'cn') checked @endif />
                    <label for="cn" class="mb-4 mr-4">簡体中文</label>
                    <input type="radio" name="lang" class="visually-hidden" id="es" value="es"
                      @if (App::getLocale() == 'es') checked @endif />
                    <label for="es" class="mb-4 mr-4">Español</label>
                    <input type="radio" name="lang" class="visually-hidden" id="fr" value="fr"
                      @if (App::getLocale() == 'fr') checked @endif />
                    <label for="fr" class="mb-4 mr-4">Français</label>
                    <input type="radio" name="lang" class="visually-hidden" id="it" value="it"
                      @if (App::getLocale() == 'it') checked @endif />
                    <label for="it" class="mb-4 mr-4">Italiano</label>
                    <input type="radio" name="lang" class="visually-hidden" id="id" value="id"
                      @if (App::getLocale() == 'id') checked @endif />
                    <label for="id" class="mb-4 mr-4">Bahasa Indonesia</label>
                    <input type="radio" name="lang" class="visually-hidden" id="th" value="th"
                      @if (App::getLocale() == 'th') checked @endif />
                    <label for="th" class="mb-4 mr-4">ภาษาไทย</label>
                    <input type="radio" name="lang" class="visually-hidden" id="ko" value="ko"
                      @if (App::getLocale() == 'ko') checked @endif />
                    <label for="ko" class="mb-4 mr-4">한국어</label>
                    <input type="radio" name="lang" class="visually-hidden" id="de" value="de"
                      @if (App::getLocale() == 'de') checked @endif />
                    <label for="de" class="mb-4 mr-4">Deutsch</label>
                    <input type="radio" name="lang" class="visually-hidden" id="hi" value="hi"
                      @if (App::getLocale() == 'hi') checked @endif />
                    <label for="hi" class="mb-4 mr-4">हिन्दी</label>
                    <input type="radio" name="lang" class="visually-hidden" id="ar" value="ar"
                      @if (App::getLocale() == 'ar') checked @endif />
                    <label for="ar" class="mb-4 mr-4">العربية</label>
                    <input type="radio" name="lang" class="visually-hidden" id="pt" value="pt"
                      @if (App::getLocale() == 'pt') checked @endif />
                    <label for="pt" class="mb-4 mr-4">Português</label>
                    <input type="radio" name="lang" class="visually-hidden" id="bn" value="bn"
                      @if (App::getLocale() == 'bn') checked @endif />
                    <label for="bn" class="mb-4 mr-4">বাংলা</label>
                  </div>
                  <button type="submit" class="btn-border mt-6">{{ __('変更する') }}</button>
                </form>

              </div>
            </div>

            {{-- 収益受け取りの準備 --}}
            <div class="p-8 m-4 lg:p-10 lg:mx-0 lg:mb-8 border border-comiee rounded-lg" id="earnings">
              <h3 class="text-xl dark:text-ddd">{{ __('収益受け取りの準備') }}</h3>
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
                  <div class="text-green bg-green bg-opacity-10 rounded p-4 inline-flex items-center max-w-6xl mx-auto">
                    <svg class="mr-2 w-[20px] h-[20px] fill-green" viewBox="0 0 20 20" fill="none">
                      <title>stripe connect success</title>
                      <path
                        d="M10 0C4.49 0 0 4.49 0 10C0 15.51 4.49 20 10 20C15.51 20 20 15.51 20 10C20 4.49 15.51 0 10 0ZM14.78 7.7L9.11 13.37C8.97 13.51 8.78 13.59 8.58 13.59C8.38 13.59 8.19 13.51 8.05 13.37L5.22 10.54C4.93 10.25 4.93 9.77 5.22 9.48C5.51 9.19 5.99 9.19 6.28 9.48L8.58 11.78L13.72 6.64C14.01 6.35 14.49 6.35 14.78 6.64C15.07 6.93 15.07 7.4 14.78 7.7Z" />
                    </svg>
                    {{ __('あなたの収益受取はStripeと連携されています') }}
                  </div>
                @endif
              </div>

              <h3 class="text-base dark:text-ddd mt-12">{{ __('収益について') }}</h3>
              <div class="mt-4">
                {{ __('日本時間の毎週金曜日0時に、4営業日前までに購入処理が完了した分の売上が入金されます。') }}<br>
                {!! __(
                    '詳しくは <a href="/terms_of_service#sales_and_author_profit" class="text-primary dark:text-[#8ab4f8]">こちら</a>',
                ) !!}
              </div>
            </div>

            {{-- アカウント管理 --}}
            <div class="p-8 m-4 lg:p-10 lg:mx-0 border border-comiee rounded-lg" id="account-delete">

              {{-- ログアウト --}}
              <div class="mb-8">
                <h3 class="text-xl dark:text-ddd">{{ __('アカウントをログアウト') }}</h3>
                <div class="mt-6">
                  <form id="logout-button" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red border borde-red px-4 py-2 rounded-[5px]">
                      {{ __('ログアウトする') }}
                    </button>
                  </form>
                </div>
              </div>

              {{-- アカウントの削除 --}}
              <div class="mt-4">
                <h3 class="text-xl dark:text-ddd">{{ __('アカウントの削除') }}</h3>
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

                      <form method="POST" action="{{ route('users.delete', ['username' => $user->username]) }}"
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
          </main>
        </div>
      </div>
    </div>
  @endif

  <footer-contents></footer-contents>
@endsection
