<div class="fixed top-0 z-[100] bg-white opacity-0 hover:opacity-100 dark:bg-dark w-full">
  <div class="max-w-8xl mx-auto">
    <div class="py-4 lg:px-8 mx-4 lg:mx-0">
      <div class="relative flex items-center">

        {{-- ロゴ --}}
        @include('atoms.nav.logo')

        <div class="hidden md:flex items-center ml-16 mr-auto">
          @include('search.atoms._tabs', ['tab' => 0])
        </div>

        <div class="flex items-center md:ml-auto">
          <search-form :lang='@json(app()->getLocale())' class="mr-8"></search-form>
          <div class="hidden lg:flex items-center">
            <nav class="text-sm">
              <div class="flex items-center">
                @guest
                  @include('auth._login')
                @endguest

                @include('atoms.nav.create_book')
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('atoms._spnav', ['tab' => $tab])
