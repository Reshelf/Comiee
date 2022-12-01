<div class="flex items-center">
    @guest
        <a href="{{ route('ranking', app()->getLocale()) }}"
            class="{{ $tab === 1 ? 'font-bold' : 'border-transparent hover:text-primary hover:font-semibold hover:dark:border-dark' }} py-3 px-4">ランキング</a>
    @endguest
    <a href="{{ route('todays_new', app()->getLocale()) }}"
        class="{{ $tab === 2 ? 'font-bold' : 'border-transparent hover:text-primary hover:font-semibold hover:dark:border-dark' }} py-3 px-4">今日の新作</a>
    @auth
        <a href="{{ route('search.like', app()->getLocale()) }}"
            class="{{ $tab === 3 ? 'font-bold' : 'border-transparent hover:text-primary hover:font-semibold hover:dark:border-dark' }} py-3 px-4">お気に入り</a>
    @endauth
    @auth
        <a href="{{ route('ranking', app()->getLocale()) }}"
            class="{{ $tab === 1 ? 'font-bold' : 'border-transparent hover:text-primary hover:font-semibold hover:dark:border-dark' }} py-3 px-4">ランキング</a>
    @endauth
</div>
