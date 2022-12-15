<div class="w-full hidden lg:flex flex-col items-start justify-center p-2 mb-4 tracking-widest">
  <h3 class="font-semibold mb-2">{{ __('Starbooksを楽しもう') }}</h3>
  <a href="{{ route('others.user_guide', app()->getLocale()) }}"
    class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary dark:hover:text-ddd"
    aria-current="page">
    {{ __('ご利用ガイド') }}
  </a>
  <a href="{{ route('others.faq.1', app()->getLocale()) }}"
    class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary dark:hover:text-ddd"
    aria-current="page">
    {{ __('よくあるご質問') }}
  </a>

  @auth
    <comment-post-modal>
      <template #btn-trigger>
        <span class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary dark:hover:text-ddd"
          aria-current="page">
          {{ __('お問い合わせ') }}
        </span>
      </template>
      <template #header>{{ __('運営へのお問い合せ') }}</template>
      <form method="POST" action="{{ route('others.contact', ['lang' => app()->getLocale(), 'user' => Auth::user()]) }}">
        @csrf
        <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
        <textarea class="count_6 dark:bg-dark-1 w-full h-[250px] rounded-[3px]" placeholder="{{ __('お問い合せ内容を記入してください。') }}"
          autocomplete="off" autofocus="on" type="text" name="body" maxlength="400" required></textarea>
        <div class="mb-4 text-right">
          <span class="string_count_6">0</span>
          <span>/400文字</span>
        </div>

        <button type="submit" class="btn w-full">{{ __('送信する') }}</button>
      </form>
    </comment-post-modal>
  @endauth
</div>
<div class="w-full hidden lg:flex flex-col items-start justify-center p-2 mb-4 tracking-widest">
  <tag-search-modal>
    <template #trigger>{{ __('タグからさがす') }}</template>
  </tag-search-modal>
</div>
