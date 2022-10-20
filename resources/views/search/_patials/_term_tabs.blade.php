@if ($ranking)
    <div class="inline-flex items-center mb-4">
        <a href="{{ route('search.ranking') }}"
            class="{{ $genre === 0 ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">総合</a>
        <a href="{{ route('search.ranking.boys') }}"
            class="{{ $genre === 1 ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">少年</a>
        <a href="{{ route('search.ranking.youth') }}"
            class="{{ $genre === 2 ? 'border-[#4624e1] text-[#4624e1] font-bold' : 'border-transparent hover:text-[#4624e1] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">青年</a>
        <a href="{{ route('search.ranking.girls') }}"
            class="{{ $genre === 3 ? 'border-[#e12427] text-[#e12427] font-bold' : 'border-transparent hover:text-[#e12427] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">少女</a>
        <a href="{{ route('search.ranking.woman') }}"
            class="{{ $genre === 4 ? 'border-[#e12499] text-[#e12499] font-bold' : 'border-transparent hover:text-[#e12499] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">女性</a>
        <a href="{{ route('search.ranking.adult') }}"
            class="{{ $genre === 5 ? 'border-[#b824e1] text-[#b824e1] font-bold' : 'border-transparent hover:text-[#b824e1] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">オトナ</a>
    </div>
@endif

@if ($todays_new)
    <div class="inline-flex items-center mb-4">
        <a href="{{ route('todays_new') }}"
            class="{{ $genre === 0 ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">総合</a>
        <a href="{{ route('todays_new.boys') }}"
            class="{{ $genre === 1 ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">少年</a>
        <a href="{{ route('todays_new.youth') }}"
            class="{{ $genre === 2 ? 'border-[#4624e1] text-[#4624e1] font-bold' : 'border-transparent hover:text-[#4624e1] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">青年</a>
        <a href="{{ route('todays_new.girls') }}"
            class="{{ $genre === 3 ? 'border-[#e12427] text-[#e12427] font-bold' : 'border-transparent hover:text-[#e12427] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">少女</a>
        <a href="{{ route('todays_new.woman') }}"
            class="{{ $genre === 4 ? 'border-[#e12499] text-[#e12499] font-bold' : 'border-transparent hover:text-[#e12499] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">女性</a>
        <a href="{{ route('todays_new.adult') }}"
            class="{{ $genre === 5 ? 'border-[#b824e1] text-[#b824e1] font-bold' : 'border-transparent hover:text-[#b824e1] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">オトナ</a>
    </div>
@endif
