@extends('app')

@section('title', '「特定商取引に関する法律」及び「資金決済に関する法律」に基づく表示 | Starbooks')

@section('content')
    @include('_patials._nav', ['tab' => 0]))

    <div class="container my-8">
        <h2 class="text-3xl font-semibold">「特定商取引に関する法律」及び「資金決済に関する法律」に基づく表示</h2>
    </div>

    @include('_patials._footer')
@endsection
