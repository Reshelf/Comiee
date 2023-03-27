<div class="w-full hidden lg:flex flex-col items-start justify-center p-2 mb-4 tracking-widest">
  <h3 class="font-bold mb-2">{{ __('Comieeを楽しもう') }}</h3>
  <a href="{{ route('others.about.comiee') }}"
    class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary dark:hover:text-ddd"
    aria-current="page">
    {{ __('Comieeについて') }}
  </a>
  <a href="{{ route('others.user_guide') }}"
    class="w-full h-full flex items-center px-3 py-2 rounded text-xs hover:text-primary dark:hover:text-ddd"
    aria-current="page">
    {{ __('ご利用ガイド') }}
  </a>
  <a href="{{ route('others.faq', ['number' => 1]) }}"
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
      <form method="POST" action="{{ route('others.contact', ['user' => Auth::user()]) }}" onsubmit="submit_btn()">
        @csrf
        <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
        <textarea class="count_6 text-area" placeholder="{{ __('お問い合せ内容を記入してください。') }}" autocomplete="off" autofocus="on"
          type="text" name="body" maxlength="400" required></textarea>
        <div class="mb-4 text-right">
          <span class="string_count_6">0</span>
          <span>/400</span>
        </div>

        <div class="relative">
          <button type="submit" class="submit_btn2 btn-primary lg:py-4 w-full">
            {{ __('送信する') }}
            <span class="load loading"></span>
          </button>
        </div>

      </form>
    </comment-post-modal>
  @endauth

  {{-- <h3 class="font-bold mt-8 mb-2">{{ __('トレンド') }}</h3>
  <tag-search-modal class="px-3 py-2 text-xs">
    <template #trigger>{{ __('タグからさがす') }}</template>
  </tag-search-modal> --}}
</div>
