<div class="w-full md:w-auto md:pr-8">
    <div class="flex justify-start mb-12 text-xs">
        <a href="{{ route('others.user_guide', app()->getLocale()) }}" class="pr-2">Help Center</a>>
        <a href="{{ route('others.faq.1', app()->getLocale()) }}" class="pl-2">{{ __('よくあるご質問') }}</a>
    </div>

    <div class="my-12">
        <h3 class="text-xs mb-4 cursor-default">{{ __('読者の方からよくあるご質問') }}</h3>
        <a href="{{ route('others.faq.1', app()->getLocale()) }}"
            class="{{ $faq_1 ? 'font-semibold border-l-4' : 'hover:text-primary dark:hover:text-ddd' }} pl-4 py-2 mb-2 block">
            {{ __('サービスについて') }}</a>
        <a href="{{ route('others.faq.2', app()->getLocale()) }}"
            class="{{ $faq_2 ? 'font-semibold border-l-4' : 'hover:text-primary dark:hover:text-ddd' }} pl-4 py-2 mb-2 block">
            {{ __('会員登録・ログインについて') }}
        </a>
        <a href="{{ route('others.faq.3', app()->getLocale()) }}"
            class="{{ $faq_3 ? 'font-semibold border-l-4' : 'hover:text-primary dark:hover:text-ddd' }} pl-4 py-2 mb-2 block">
            {{ __('ポイントや作品の購入について') }}</a>
        <a href="{{ route('others.faq.4', app()->getLocale()) }}"
            class="{{ $faq_4 ? 'font-semibold border-l-4' : 'hover:text-primary dark:hover:text-ddd' }} pl-4 py-2 mb-2 block">
            {{ __('その他') }}
        </a>
    </div>

    <div class="">
        <h3 class="text-xs mb-4 cursor-default">{{ __('作者の方からよくあるご質問') }}</h3>
        <a href="{{ route('others.faq.5', app()->getLocale()) }}"
            class="{{ $faq_5 ? 'font-semibold border-l-4' : 'hover:text-primary dark:hover:text-ddd' }} pl-4 py-2 mb-2 block">
            {{ __('作品の投稿について') }}</a>
        <a href="{{ route('others.faq.6', app()->getLocale()) }}"
            class="{{ $faq_6 ? 'font-semibold border-l-4' : 'hover:text-primary dark:hover:text-ddd' }} pl-4 py-2 mb-2 block">
            {{ __('作品の収益化について') }}
        </a>
        <a href="{{ route('others.faq.7', app()->getLocale()) }}"
            class="{{ $faq_7 ? 'font-semibold border-l-4' : 'hover:text-primary dark:hover:text-ddd' }} pl-4 py-2 mb-2 block">
            {{ __('その他') }}
        </a>
    </div>
</div>
