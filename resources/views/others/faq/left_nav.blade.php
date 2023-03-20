<div class="w-full md:w-auto md:pr-8">
  <div class="flex justify-start mb-12 text-xs">
    <a href="{{ route('others.user_guide', app()->getLocale()) }}" class="pr-2">Help Center</a>>
    <a href="{{ route('others.faq', ['lang' => app()->getLocale(), 'number' => 1]) }}"
      class="pl-2">{{ __('よくあるご質問') }}</a>
  </div>

  <div class="my-12">
    <h3 class="text-xs mb-4 cursor-default">{{ __('読者の方からよくあるご質問') }}</h3>
    <a href="{{ route('others.faq', ['lang' => app()->getLocale(), 'number' => 1]) }}"
      class="{{ $faq_number == 1 ? 'font-semibold border-l-4' : 'hover:text-primary dark:hover:text-ddd' }} pl-4 py-2 mb-2 block">
      {{ __('サービスについて') }}</a>
    <a href="{{ route('others.faq', ['lang' => app()->getLocale(), 'number' => 2]) }}"
      class="{{ $faq_number == 2 ? 'font-semibold border-l-4' : 'hover:text-primary dark:hover:text-ddd' }} pl-4 py-2 mb-2 block">
      {{ __('会員登録・ログインについて') }}
    </a>
    <a href="{{ route('others.faq', ['lang' => app()->getLocale(), 'number' => 3]) }}"
      class="{{ $faq_number == 3 ? 'font-semibold border-l-4' : 'hover:text-primary dark:hover:text-ddd' }} pl-4 py-2 mb-2 block">
      {{ __('作品の購入について') }}</a>
    <a href="{{ route('others.faq', ['lang' => app()->getLocale(), 'number' => 4]) }}"
      class="{{ $faq_number == 4 ? 'font-semibold border-l-4' : 'hover:text-primary dark:hover:text-ddd' }} pl-4 py-2 mb-2 block">
      {{ __('その他') }}
    </a>
  </div>

  <div class="">
    <h3 class="text-xs mb-4 cursor-default">{{ __('クリエイターの方からよくあるご質問') }}</h3>
    <a href="{{ route('others.faq', ['lang' => app()->getLocale(), 'number' => 5]) }}"
      class="{{ $faq_number == 5 ? 'font-semibold border-l-4' : 'hover:text-primary dark:hover:text-ddd' }} pl-4 py-2 mb-2 block">
      {{ __('作品の投稿について') }}</a>
    <a href="{{ route('others.faq', ['lang' => app()->getLocale(), 'number' => 6]) }}"
      class="{{ $faq_number == 6 ? 'font-semibold border-l-4' : 'hover:text-primary dark:hover:text-ddd' }} pl-4 py-2 mb-2 block">
      {{ __('作品の収益化について') }}
    </a>
    <a href="{{ route('others.faq', ['lang' => app()->getLocale(), 'number' => 7]) }}"
      class="{{ $faq_number == 7 ? 'font-semibold border-l-4' : 'hover:text-primary dark:hover:text-ddd' }} pl-4 py-2 mb-2 block">
      {{ __('その他') }}
    </a>
  </div>
</div>
