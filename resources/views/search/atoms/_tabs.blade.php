<div class="flex items-center">
  <a href="{{ route('top', app()->getLocale()) }}"
    class="{{ $tab === 0 ? 'dark:text-ddd font-bold' : 'border-transparent hover:text-primary dark:hover:text-ddd hover:font-semibold hover:dark:border-dark' }} py-3 px-4">{{ __('ホーム') }}</a>

  @guest
    <a href="{{ route('ranking', app()->getLocale()) }}"
      class="{{ $tab === 1 ? 'dark:text-ddd font-bold' : 'border-transparent hover:text-primary dark:hover:text-ddd hover:font-semibold hover:dark:border-dark' }} py-3 px-4">{{ __('ランキング') }}</a>
  @endguest
  @auth
    <a href="{{ route('ranking', app()->getLocale()) }}"
      class="{{ $tab === 1 ? 'dark:text-ddd font-bold' : 'border-transparent hover:text-primary dark:hover:text-ddd hover:font-semibold hover:dark:border-dark' }} py-3 px-4">{{ __('ランキング') }}</a>
    <a href="{{ route('user.shelf.like', app()->getLocale()) }}"
      class="{{ $tab === 3 ? 'dark:text-ddd font-bold' : 'border-transparent hover:text-primary dark:hover:text-ddd hover:font-semibold hover:dark:border-dark' }} py-3 px-4">{{ __('本棚') }}</a>
  @endauth
</div>
