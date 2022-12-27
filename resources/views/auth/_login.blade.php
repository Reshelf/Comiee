<auth-modal>
  <template #trigger>{{ __('ログイン') }}</template>
  <template #header>{{ __('ログイン') }}</template>

  <form method="POST" action="{{ route('login', app()->getLocale()) }}" class="dark:bg-dark-1" onsubmit="submit_btn()">
    @csrf
    <div class="w-full mb-3">
      <input class="card-input" type="text" name="email" required placeholder="{{ __('メールアドレス') }}">
    </div>
    <div class="w-full mb-6">
      <input class="card-input" type="password" name="password" required placeholder="{{ __('パスワード') }}">
    </div>
    <input type="hidden" name="remember" value="on">
    <div class="relative mb-4">
      <button type="submit" class="submit_btn btn-primary px-6 py-3 md:py-4 w-full">
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
</auth-modal>

<a href="{{ route('register') }}" class="ml-4 hover:text-primary">新規登録</a>
