@extends('app')

@section('title', 'サービスについて | Starbooks')

@section('content')
    @include('_patials._help_nav')

    <div class="w-full flex">
        <div class="w-[30%] bg-f8 dark:bg-dark p-8 flex flex-col items-end">
            @include('others.faq.atoms.left_nav')
        </div>

        <div class="w-[70%] flex items-center justify-center">

        </div>
    </div>

    @include('_patials._footer')
@endsection
