<template #5>
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
          class="bg-green bg-opacity-10 text-green px-4 py-2 rounded-[3px] font-semibold">あなたの収益受取はStripeと連携されています</span>
      @endif
    </div>

    <h3 class="text-base font-semibold mt-12">{{ __('収益について') }}</h3>
    <div class="mt-4">
    </div>
  </div>
</template>
