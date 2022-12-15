<book-edit-modal>
  <template #trigger>{{ __('ログイン') }}</template>
  <template #header>{{ __('ログイン') }}</template>

  <form method="POST" action="{{ route('login', app()->getLocale()) }}" class="dark:bg-dark-1" onsubmit="submit_btn()">
    @csrf
    <div class="w-full mb-3">
      <input
        class="w-full text-[15px] px-2 py-3 rounded-[3px] border border-l-0 border-r-0 border-t-0 border-b-ccc dark:border-b-dark dark:bg-dark-2"
        type="text" name="email" required placeholder="{{ __('メールアドレス') }}">
    </div>
    <div class="w-full mb-6">
      <input
        class="w-full text-[15px] px-2 py-3 rounded-[3px] border border-l-0 border-r-0 border-t-0 border-b-ccc dark:border-b-dark dark:bg-dark-2"
        type="password" name="password" required placeholder="{{ __('パスワード') }}">
    </div>
    <input type="hidden" name="remember" value="on">
    <div class="relative mb-4">
      <button type="submit" class="submit_btn btn-primary px-6 py-4 w-full">
        {{ __('ログイン') }}
        <span class="load loading"></span>
      </button>
    </div>
  </form>
  <div class="w-full flex justify-between">
    <a href="{{ route('password.request', app()->getLocale()) }}"
      class="cursor-pointer text-xs">{{ __('パスワードを忘れた方') }}</a>
    <a href="/register" class="text-xs cursor-pointer">{{ __('または新規登録') }}</a>
  </div>
</book-edit-modal>
