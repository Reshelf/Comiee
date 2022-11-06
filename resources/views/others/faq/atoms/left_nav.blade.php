<div class="w-full md:w-auto md:pr-8">
    <div class="flex justify-start mb-12 text-xs">
        <a href="{{ route('others.user_guide') }}" class="pr-2">Help Center</a>>
        <a href="{{ route('others.faq.1') }}" class="pl-2">よくあるご質問</a>
    </div>

    <div class="my-12">
        <h3 class="text-xs mb-4 cursor-default">読者の方からよくあるご質問</h3>
        <a href="{{ route('others.faq.1') }}"
            class="{{ $faq_1 ? 'font-semibold border-l-4' : 'hover:text-primary' }} pl-4 py-2 mb-2 block">
            サービスについて</a>
        <a href="{{ route('others.faq.2') }}"
            class="{{ $faq_2 ? 'font-semibold border-l-4' : 'hover:text-primary' }} pl-4 py-2 mb-2 block">
            会員登録・ログインについて
        </a>
        <a href="{{ route('others.faq.3') }}"
            class="{{ $faq_3 ? 'font-semibold border-l-4' : 'hover:text-primary' }} pl-4 py-2 mb-2 block">
            ポイントや作品の購入について</a>
        <a href="{{ route('others.faq.4') }}"
            class="{{ $faq_4 ? 'font-semibold border-l-4' : 'hover:text-primary' }} pl-4 py-2 mb-2 block">
            その他
        </a>
    </div>

    <div class="">
        <h3 class="text-xs mb-4 cursor-default">作者の方からよくあるご質問</h3>
        <a href="{{ route('others.faq.5') }}"
            class="{{ $faq_5 ? 'font-semibold border-l-4' : 'hover:text-primary' }} pl-4 py-2 mb-2 block">
            作品の投稿について</a>
        <a href="{{ route('others.faq.6') }}"
            class="{{ $faq_6 ? 'font-semibold border-l-4' : 'hover:text-primary' }} pl-4 py-2 mb-2 block">
            作品の収益化について
        </a>
        <a href="{{ route('others.faq.7') }}"
            class="{{ $faq_7 ? 'font-semibold border-l-4' : 'hover:text-primary' }} pl-4 py-2 mb-2 block">
            その他
        </a>
    </div>
</div>
