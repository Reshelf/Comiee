<div class="inline-flex items-center mb-2">
    <a href="{{ route('search.ranking') }}"
        class="{{ $ranking ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-[15px] py-3 px-6 border-b-2">総合</a>
    <a href="{{ route('search.todays_new') }}"
        class="{{ $todays_new ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-[15px] py-3 px-6 border-b-2">デイリー</a>
    <a href="{{ route('search.like') }}"
        class="{{ $like ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-[15px] py-3 px-6 border-b-2">週間</a>
    <a href="{{ route('search.ranking') }}"
        class="{{ $ranking ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-[15px] py-3 px-6 border-b-2">月間</a>
</div>
