<div class="flex items-center">
    @if (!Auth::user())
        <a href="{{ route('search.ranking') }}"
            class="{{ $ranking ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold hover:border-primary dark:border-dark' }} text-[15px] font-semibold py-3 px-6 border-b-2">ランキング</a>
    @endif
    <a href="{{ route('search.todays_new') }}"
        class="{{ $todays_new ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold hover:border-primary dark:border-dark' }} text-[15px] font-semibold py-3 px-6 border-b-2">今日の新作</a>
    @if (Auth::user())
        <a href="{{ route('search.like') }}"
            class="{{ $like ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold hover:border-primary dark:border-dark' }} text-[15px] font-semibold py-3 px-6 border-b-2">お気に入り</a>
        <a href="{{ route('search.following') }}"
            class="{{ $following ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold hover:border-primary dark:border-dark' }} text-[15px] font-semibold py-3 px-6 border-b-2">フォロー中</a>
    @endif
    @if (Auth::user())
        <a href="{{ route('search.ranking') }}"
            class="{{ $ranking ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold hover:border-primary dark:border-dark' }} text-[15px] font-semibold py-3 px-6 border-b-2">ランキング</a>
    @endif
</div>
