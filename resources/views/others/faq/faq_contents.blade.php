@php
  $update_date = '2023/1/20';
@endphp

@section('content')
  @include('atoms._help_nav')
  <div class="w-full flex flex-col md:flex-row">
    <div class="w-full md:w-[30%] bg-f8 dark:bg-dark p-8 flex flex-col items-end">
      @include('others.faq.left_nav')
    </div>
    <div class="w-full md:w-[70%] p-8 md:py-8 md:pl-20 md:pr-48">

      <h2 class="text-3xl font-bold tracking-widest dark:text-ddd">{{ $title }}</h2>
      <span class="inline-block mt-4 text-bbb">{{ $update_date }} {{ __('更新') }}</span>

      <div class="my-8 text-base">
        <div class="flex flex-col text-primary dark:text-[#8ab4f8] mt-2 text-base">
          @foreach ($faqs as $key => $faq)
            <a href="#{{ $key }}" class="my-2">・{{ $faq['title'] }}</a>
          @endforeach
        </div>
      </div>

      @foreach ($faqs as $key => $faq)
        <div class="my-12">
          <h3 id="{{ $key }}" class="text-2xl font-bold tracking-widest">
            {{ $faq['title'] }}
          </h3>
          <p class="mt-4 leading-8 text-base whitespace-pre-line">
            {!! nl2br(e($faq['description'])) !!}
          </p>
        </div>
      @endforeach

    </div>
  </div>
  @include('atoms._footer')
@endsection
