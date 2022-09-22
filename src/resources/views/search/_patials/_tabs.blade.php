<div class="w-full mb-4 flex-none">
    <div class="max-w-8xl mx-auto">
        <div class="relative flex items-center">
            <a href="{{ route('search.ranking') }}"
                class="py-3 px-6 border-b-2 border-white dark:border-dark dark:hover:border-primary hover:border-primary hover:text-primary hover:font-semibold">ランキング</a>
            <a href="{{ route('search.todays_new') }}"
                class="py-3 px-6 border-b-2 border-white dark:border-dark dark:hover:border-primary hover:border-primary hover:text-primary hover:font-semibold">今日の新作</a>
            @if (Auth::user())
                <a href="{{ route('search.like') }}"
                    class="py-3 px-6 border-b-2 border-white dark:border-dark dark:hover:border-primary hover:border-primary hover:text-primary hover:font-semibold">お気に入り</a>
                <a href="{{ route('search.following') }}"
                    class="py-3 px-6 border-b-2 border-white dark:border-dark dark:hover:border-primary hover:border-primary hover:text-primary hover:font-semibold">フォロー中</a>
            @endif
        </div>
    </div>
</div>
