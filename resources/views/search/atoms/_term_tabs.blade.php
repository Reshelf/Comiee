<div class="overflow-x-scroll inline-flex items-center mb-4 scroll-none">
  <a href="{{ route('ranking', app()->getLocale()) }}"
    class="{{ $genre === 0 ? 'border-primary text-primary dark:text-ddd font-bold' : 'border-transparent hover:text-primary dark:hover:text-ddd hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('総合') }}</a>
  <a href="{{ route('ranking.boys', app()->getLocale()) }}"
    class="{{ $genre === 1 ? 'border-primary text-primary dark:text-ddd font-bold' : 'border-transparent hover:text-primary dark:hover:text-ddd hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('少年') }}</a>
  <a href="{{ route('ranking.youth', app()->getLocale()) }}"
    class="{{ $genre === 2 ? 'border-[#4624e1] text-[#4624e1] dark:text-ddd font-bold' : 'border-transparent hover:text-[#4624e1] dark:hover:text-ddd hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('青年') }}</a>
  <a href="{{ route('ranking.girls', app()->getLocale()) }}"
    class="{{ $genre === 3 ? 'border-[#e12427] text-[#e12427] dark:text-ddd font-bold' : 'border-transparent hover:text-[#e12427] dark:hover:text-ddd hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('少女') }}</a>
  <a href="{{ route('ranking.woman', app()->getLocale()) }}"
    class="{{ $genre === 4 ? 'border-[#e12499] text-[#e12499] dark:text-ddd font-bold' : 'border-transparent hover:text-[#e12499] dark:hover:text-ddd hover:font-semibold dark:border-dark' }} text-sm md:text-base py-3 px-6 border-b-2 whitespace-nowrap">{{ __('女性') }}</a>
</div>
