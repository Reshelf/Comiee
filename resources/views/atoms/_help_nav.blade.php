<div class="bg-white dark:bg-dark w-full flex-none">
  <div class="max-w-8xl mx-auto">
    <div class="py-4 md:border-b border-slate-900/10 lg:px-8 lg:border-0 dark:border-slate-300/10 mx-4 lg:mx-0">
      <div class="relative flex items-center">

        {{-- ロゴ --}}
        @include('atoms.nav.logo')

        <div class="flex items-center md:ml-auto">
          <div class="hidden lg:flex items-center">
            <nav class="text-sm">
              <div class="flex items-center">
                @guest
                  <a href="{{ route('login') }}" class="btn-primary">ログイン</a>
                  <a href="{{ route('register') }}" class="ml-4 hover:text-primary dark:hover:text-f5">新規登録</a>
                @endguest
                @auth
                  @include('atoms.nav.user_modal')
                @endauth
              </div>
            </nav>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
