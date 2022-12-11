<template #5>
    <div class="mb-8">
        <h3 class="text-base font-semibold">{{ __('収益受取アカウントの連結') }}</h3>
        <div class="mt-4">
            <p class="mb-6">
                Stripeアカウントを連携して受取設定を完了させましょう!
            </p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (empty(Auth::user()->stripe_user_id))
                <a href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id={{ config('app.stripe_connect_client_id') }}&scope=read_write&redirect_uri={{ config('app.url') }}/connect"
                    class="btn-primary">Stripeアカウントを連携する</a>
            @endif
        </div>

        <h3 class="text-base font-semibold mt-12">{{ __('具体的な説明') }}</h3>
        <div class="mt-4">
            @if (empty(Auth::user()->stripe_user_id))
                <div class="mb-8">
                    <div class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
                        {{ __('Starbooksでは、決済方法にStripeという決済ツールを使用しており、読者はStripeを経由してあなたの作品を購入します。') }}
                    </div>
                    <div class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
                        {{ __('あなたの売上は、Stirpeの決済手数料3.6%とStarbooksのプラットフォーム利用料30%を引いた売上約70%です') }}
                    </div>
                    <div class="mb-2 bg-primary bg-opacity-10 text-primary px-4 py-2 font-semibold">
                        {{ __('振込タイミングは「毎週1回」で、あなたの売上がStripeアカウントの残高に入ってくるようになっています。') }}
                    </div>
                    <div class="mt-4 leading-8">
                        <p>ここで、1話50円のエピソードが購入されたときの作者の売上試算をみてみます。</p>
                        <p>【Stripe決済手数料】= 1.8円（【エピソード1話】50円 × 3.6%）</p>
                        <p>【税抜売上】= 48.2円（50円 - 【Stripe決済手数料】1.8円） </p>
                        <p>【税込売上】= 45.79円 {48.2円 -【消費税10%】2.41円} </p>
                        <p>【作者収益】= 32.053円 {45.79円 -【Starbooksプラットホーム利用料30%】 13.737円)}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</template>
