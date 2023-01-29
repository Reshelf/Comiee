@extends('app')

@section('title', __('設定'))

@php
  $a = __('メール通知');
  //   $b = __('購入履歴');
  //   $c = __('表示しない作品');
  $d = __('サイトの表示設定');
  $e = __('収益の受取');

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
      <div class="w-full lg:mt-4 mx-12">
        <div class="w-full lg:my-4 flex">
          <div class="tab">
            <ul class="tabMenu scroll-none sticky top-0 lg:h-[142px]">
              <a href="#mail-notification">
                {{ $a }}
              </a>
              <a href="#site-display">
                {{ $d }}
              </a>
              <a href="#earnings">
                {{ $e }}
              </a>
              <a href="{{ route('users.show', ['lang' => app()->getLocale(), 'username' => Auth::user()->username]) }}">
                マイページ
              </a>
            </ul>
            <div class="tabContents">
              <div class="mb-8 border-b border-ccc" id="mail-notification">
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
              <div class="my-8 border-b border-ccc" id="site-display">

                <div class="mt-4">
                  <h3 class="text-base font-semibold">{{ __('表示言語') }}</h3>
                  <div class="mt-4">
                    <div class="mb-4">
                      @if (App::getLocale() == 'ja')
                        日本語
                      @else
                        English
                      @endif
                    </div>
                    <a href="{{ locale_change_url() }}" class="inline-block btn-border px-2">
                      @if (app()->getLocale() == 'ja')
                        英語に変える
                      @else
                        Change to Japanese
                      @endif
                    </a>
                  </div>
                </div>

                <div class="my-8">
                  <h3 class="text-base font-semibold">{{ __('外観') }}</h3>
                  <div class="mt-4">
                    <theme-toggle :one='@json($dark)' :two='@json($light)'></theme-toggle>
                  </div>
                </div>
              </div>
              <div class="my-8" id="earnings">
                <div class="mt-4 mb-8">
                  <h3 class="text-base font-semibold">{{ __('収益を受け取る準備をする') }}</h3>
                  <div class="mt-6">
                    @if (empty(Auth::user()->stripe_user_id))
                      <p class="mb-6">
                        Stripeアカウントを連携して受取設定を完了させましょう。
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
                      <span
                        class="bg-green bg-opacity-10 text-green px-4 py-2 rounded-[5px] font-semibold">あなたの収益受取はStripeと連携されています</span>
                    @endif
                  </div>

                  <h3 class="text-base font-semibold mt-12">{{ __('収益について') }}</h3>
                  <div class="mt-4">
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
