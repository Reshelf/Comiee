<div class="overflow-x-scroll inline-flex items-center mb-4 scroll-none">
    @if ($ranking)
        <a href="{{ route('ranking', app()->getLocale()) }}"
            class="{{ $genre === 0 ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('総合') }}</a>
        <a href="{{ route('ranking.boys', app()->getLocale()) }}"
            class="{{ $genre === 1 ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('少年') }}</a>
        <a href="{{ route('ranking.youth', app()->getLocale()) }}"
            class="{{ $genre === 2 ? 'border-[#4624e1] text-[#4624e1] font-bold' : 'border-transparent hover:text-[#4624e1] hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('青年') }}</a>
        <a href="{{ route('ranking.girls', app()->getLocale()) }}"
            class="{{ $genre === 3 ? 'border-[#e12427] text-[#e12427] font-bold' : 'border-transparent hover:text-[#e12427] hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('少女') }}</a>
        <a href="{{ route('ranking.woman', app()->getLocale()) }}"
            class="{{ $genre === 4 ? 'border-[#e12499] text-[#e12499] font-bold' : 'border-transparent hover:text-[#e12499] hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('女性') }}</a>
        <a href="{{ route('ranking.adult', app()->getLocale()) }}"
            class="{{ $genre === 5 ? 'border-[#b824e1] text-[#b824e1] font-bold' : 'border-transparent hover:text-[#b824e1] hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('オトナ') }}</a>
    @endif
    @if ($todays_new)
        <a href="{{ route('todays_new', app()->getLocale()) }}"
            class="{{ $genre === 0 ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('総合') }}</a>
        <a href="{{ route('todays_new.boys', app()->getLocale()) }}"
            class="{{ $genre === 1 ? 'border-primary text-primary font-bold' : 'border-transparent hover:text-primary hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('少年') }}</a>
        <a href="{{ route('todays_new.youth', app()->getLocale()) }}"
            class="{{ $genre === 2 ? 'border-[#4624e1] text-[#4624e1] font-bold' : 'border-transparent hover:text-[#4624e1] hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('青年') }}</a>
        <a href="{{ route('todays_new.girls', app()->getLocale()) }}"
            class="{{ $genre === 3 ? 'border-[#e12427] text-[#e12427] font-bold' : 'border-transparent hover:text-[#e12427] hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('少女') }}</a>
        <a href="{{ route('todays_new.woman', app()->getLocale()) }}"
            class="{{ $genre === 4 ? 'border-[#e12499] text-[#e12499] font-bold' : 'border-transparent hover:text-[#e12499] hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('女性') }}</a>
        <a href="{{ route('todays_new.adult', app()->getLocale()) }}"
            class="{{ $genre === 5 ? 'border-[#b824e1] text-[#b824e1] font-bold' : 'border-transparent hover:text-[#b824e1] hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('オトナ') }}</a>
    @endif
</div>
