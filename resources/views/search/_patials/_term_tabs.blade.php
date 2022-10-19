@if ($ranking)
    <div class="inline-flex items-center mb-4">
        <a href="{{ route('search.ranking') }}"
            class="{{ $all ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">総合</a>
        <a href="{{ route('search.ranking.boys') }}"
            class="{{ $boys ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">少年</a>
        <a href="{{ route('search.ranking.youth') }}"
            class="{{ $youth ? 'border-[#4624e1] text-[#4624e1] font-bold' : 'border-transparent hover:text-[#4624e1] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">青年</a>
        <a href="{{ route('search.ranking.girls') }}"
            class="{{ $girls ? 'border-[#e12427] text-[#e12427] font-bold' : 'border-transparent hover:text-[#e12427] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">少女</a>
        <a href="{{ route('search.ranking.woman') }}"
            class="{{ $woman ? 'border-[#e12499] text-[#e12499] font-bold' : 'border-transparent hover:text-[#e12499] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">女性</a>
        <a href="{{ route('search.ranking.adult') }}"
            class="{{ $adult ? 'border-[#b824e1] text-[#b824e1] font-bold' : 'border-transparent hover:text-[#b824e1] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">オトナ</a>
    </div>
@endif

@if ($todays_new)
    <div class="inline-flex items-center mb-4">
        <a href="{{ route('search.todays_new') }}"
            class="{{ $all ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">総合</a>
        <a href="{{ route('search.todays_new.boys') }}"
            class="{{ $boys ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">少年</a>
        <a href="{{ route('search.todays_new.youth') }}"
            class="{{ $youth ? 'border-[#4624e1] text-[#4624e1] font-bold' : 'border-transparent hover:text-[#4624e1] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">青年</a>
        <a href="{{ route('search.todays_new.girls') }}"
            class="{{ $girls ? 'border-[#e12427] text-[#e12427] font-bold' : 'border-transparent hover:text-[#e12427] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">少女</a>
        <a href="{{ route('search.todays_new.woman') }}"
            class="{{ $woman ? 'border-[#e12499] text-[#e12499] font-bold' : 'border-transparent hover:text-[#e12499] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">女性</a>
        <a href="{{ route('search.todays_new.adult') }}"
            class="{{ $adult ? 'border-[#b824e1] text-[#b824e1] font-bold' : 'border-transparent hover:text-[#b824e1] hover:font-semibold dark:border-dark' }} text-base py-3 px-6 border-b-2">オトナ</a>
    </div>
@endif
