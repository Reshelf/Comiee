<div class="flex items-center">
    @if (!Auth::user())
        <a href="{{ route('search.ranking') }}"
            class="{{ $tab === 1 ? 'font-bold' : 'border-transparent hover:text-primary hover:font-semibold hover:dark:border-dark' }} py-3 px-4">ランキング</a>
    @endif
    <a href="{{ route('todays_new') }}"
        class="{{ $tab === 2 ? 'font-bold' : 'border-transparent hover:text-primary hover:font-semibold hover:dark:border-dark' }} py-3 px-4">今日の新作</a>
    @if (Auth::user())
        <a href="{{ route('search.like') }}"
            class="{{ $tab === 3 ? 'font-bold' : 'border-transparent hover:text-primary hover:font-semibold hover:dark:border-dark' }} py-3 px-4">お気に入り</a>
    @endif
    @if (Auth::user())
        <a href="{{ route('search.ranking') }}"
            class="{{ $tab === 1 ? 'font-bold' : 'border-transparent hover:text-primary hover:font-semibold hover:dark:border-dark' }} py-3 px-4">ランキング</a>
    @endif
</div>
