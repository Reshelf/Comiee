@if ($ranking)
    <div class="inline-flex items-center mb-4">
        <a href="{{ route('search.ranking') }}"
            class="{{ $ranking ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">総合</a>
        <a href="{{ route('search.todays_new') }}"
            class="{{ $todays_new ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">少年・青年</a>
        <a href="{{ route('search.like') }}"
            class="{{ $like ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">少女・女性</a>
        <a href="{{ route('search.ranking') }}"
            class="{{ $ranking ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">TL</a>
        <a href="{{ route('search.todays_new') }}"
            class="{{ $todays_new ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">BL</a>
        <a href="{{ route('search.like') }}"
            class="{{ $like ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">オトナ</a>
    </div>
@endif
