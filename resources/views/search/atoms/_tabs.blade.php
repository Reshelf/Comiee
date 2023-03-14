<div class="flex items-center">
  <a href="{{ route('top', app()->getLocale()) }}"
    class="{{ $tab === 0 ? 'dark:text-ddd font-bold' : 'border-transparent hover:text-primary dark:hover:text-ddd hover:font-semibold hover:dark:border-dark' }} py-3 px-4">{{ __('ホーム') }}</a>
  @auth
    <a href="{{ route('user.shelf.like', app()->getLocale()) }}"
      class="{{ $tab === 3 ? 'dark:text-ddd font-bold' : 'border-transparent hover:text-primary dark:hover:text-ddd hover:font-semibold hover:dark:border-dark' }} py-3 px-4">{{ __('本棚') }}</a>
  @endauth
</div>
