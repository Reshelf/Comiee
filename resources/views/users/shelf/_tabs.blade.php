<ul class="tabMenu scroll-none sticky top-0 lg:h-[300px]">
  <h3 class="text-2xl font-semibold py-4 hidden lg:block">{{ __('設定') }}</h3>
  <a href="{{ route('user.shelf.like', ['lang' => app()->getLocale()]) }}"
    class="{{ $type === 'like' ? 'font-semibold' : '' }} ">{{ __('お気に入り') }}</a>
  <a href="{{ route('user.shelf.view', ['lang' => app()->getLocale()]) }}"
    class="{{ $type === 'view_history' ? 'font-semibold' : '' }} ">{{ __('閲覧履歴') }}</a>
  <a href="{{ route('user.shelf.purchase', ['lang' => app()->getLocale()]) }}"
    class="{{ $type === 'purchase_history' ? 'font-semibold' : '' }} ">{{ __('購入履歴') }}</a>
</ul>
