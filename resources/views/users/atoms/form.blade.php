@csrf

{{-- ユーザー情報 --}}
@if (!$setup)
  {{-- カバー画像 --}}
  <div class="relative flex items-center mb-4">
    <h3 class="tracking-widest font-semibold">{{ __('カバー画像') }}</h3>
    <div class="tooltip cursor-pointer ml-1">
      <svg class="stroke-primary w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
      </svg>
      <div
        class="tooltip-item p-4 hover:flex flex-col flex-wrap whitespace-pre-line w-[300px] lg:w-[552px] top-[-310px] lg:top-[20px] left-[-70px] lg:left-[-90px] bg-white dark:bg-dark text-t-color dark:text-gray shadow-lg">
        <p class="mb-2 py-1 text-[14px]">
          {{ __('投稿できる画像形式はpng,jpg(jpeg),gif, webpです。') }}
        </p>
        <p class="py-1 text-[14px]">
          {{ __('横幅1152px, 縦幅200pxの画像サイズが最も綺麗に表示されます。') }}
        </p>
      </div>
    </div>
  </div>
  <input type="file" name="thumbnail" />


  {{-- プロフィール画像 --}}
  <div class="relative flex items-center mt-12 mb-4">
    <h3 class="tracking-widest font-semibold">{{ __('プロフィール画像') }}</h3>
    <div class="tooltip cursor-pointer ml-1">
      <svg class="stroke-primary w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
      </svg>
      <div
        class="tooltip-item p-4 hover:flex flex-col flex-wrap whitespace-pre-line w-[300px] lg:w-[552px] top-[-310px] lg:top-[20px] left-[-70px] lg:left-[-140px] bg-white dark:bg-dark text-t-color dark:text-gray shadow-lg">
        <p class="mb-2 py-1 text-[14px]">
          {{ __('投稿できる画像形式はpng,jpg(jpeg),gif, webpです。') }}
        </p>
        <p class="py-1 text-[14px]">
          {{ __('横幅200px, 縦幅200pxの画像サイズが最も綺麗に表示されます。') }}
        </p>
      </div>
    </div>
  </div>
  <input type="file" name="avatar" />


  {{-- 名前 --}}
  <h3 class="tracking-widest mt-12 mb-4 font-semibold">{{ __('名前') }}</h3>
  <div class="mb-12">
    <input type="text" name="name" value="{{ $user->name ?? old('name') }}" class="card-input" maxlength="30">
  </div>


  {{-- ユーザーID --}}
  <h3 class="tracking-widest mb-4 font-semibold">{{ __('ユーザーID') }}</h3>
  <div class="mb-12">
    <input type="text" name="username" value="{{ $user->username ?? old('username') }}" class="card-input"
      maxlength="20" minlength="4">
  </div>


  {{-- メールアドレス --}}
  <h3 class="tracking-widest mb-4 font-semibold">{{ __('メールアドレス') }}</h3>
  <div class="mb-12">
    <input type="email" name="email" value="{{ $user->email ?? old('email') }}" class="card-input" maxlength="255">
  </div>


  {{-- 自己紹介 --}}
  <h3 class="tracking-widest mb-4 font-semibold">{{ __('自己紹介') }}</h3>
  <div class="mb-8">
    <textarea name="body" placeholder="{{ __('200文字以内で入力してください。') }}" maxlength="200" class="count_2 card-textarea">{{ $user->body ?? old('body') }}</textarea>
    <div class="text-right">
      <span class="string_count_2">0</span>
      <span>/200文字</span>
    </div>
  </div>
@endif



{{-- 性別 --}}
<div class="filters flex flex-col mb-12">
  <h3 class="tracking-widest text-[15px] font-semibold">{{ __('性別') }}</h3>
  <div class="flex items-center mt-4">
    {{-- 縦スク --}}
    <input class="visually-hidden" type="radio" name="gender" value="man"
      @if (!$setup_update) id="gender_man"
    @else id="gender_man_update" @endif
      @isset($user->gender)
        @if ($user->gender === 'man') checked @endif
    @endisset />
    <label @if (!$setup_update) for="gender_man" @else for="gender_man_update" @endif>
      {{ __('男性') }}
    </label>
    {{-- 横読み --}}
    <input class="visually-hidden" type="radio" name="gender" value="woman"
      @if (!$setup_update) id="gender_woman" @else id="gender_woman_update" @endif
      @isset($user->gender)
        @if ($user->gender === 'woman') checked @endif
    @endisset />
    <label @if (!$setup_update) for="gender_woman"
    @else for="gender_woman_update" @endif
      class="ml-4">
      {{ __('女性') }}
    </label>
  </div>
</div>


{{-- 誕生日 --}}
<h3 class="tracking-widest mb-4 font-semibold">{{ __('誕生日') }}</h3>
<div class="mb-12">
  <input type="date" name="birth" id="birth" value="{{ $user->birth ?? old('birth') }}">
</div>


{{-- ウェブサイト --}}
<h3 class="tracking-widest mb-4 font-semibold">{{ __('ウェブサイト') }}</h3>
<div class="mb-12">
  <input type="text" name="website" value="{{ $user->website ?? old('website') }}" class="card-input"
    placeholder="{{ __('URLを入れてください') }}" maxlength="255">
</div>


{{-- Twitter --}}
<h3 class="tracking-widest mb-4 font-semibold">{{ __('Twitter') }}</h3>
<div class="mb-12">
  <input type="text" name="twitter" value="{{ $user->twitter ?? old('twitter') }}" class="card-input"
    placeholder="{{ __('URLを入れてください') }}" maxlength="255">
</div>


{{-- Youtube --}}
<h3 class="tracking-widest mb-4 font-semibold">{{ __('Youtube') }}</h3>
<div class="mb-12">
  <input type="text" name="youtube" value="{{ $user->youtube ?? old('youtube') }}" class="card-input"
    placeholder="{{ __('URLを入れてください') }}" maxlength="255">
</div>


{{-- Instagram --}}
<h3 class="tracking-widest mb-4 font-semibold">{{ __('Instagram') }}</h3>
<div class="mb-12">
  <input type="text" name="instagram" value="{{ $user->instagram ?? old('instagram') }}" class="card-input"
    placeholder="{{ __('URLを入れてください') }}" maxlength="255">
</div>
