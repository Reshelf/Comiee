@extends('app')

@section('title', '利用規約 - Starbooks')

@section('content')
    @include('_patials._nav', [
        'ranking' => false,
        'todays_new' => false,
        'like' => false,
        'following' => false,
    ])

    <div class="container my-8">
        <h2 class="text-3xl font-semibold">利用規約</h2>
    </div>

    @include('_patials._footer')
@endsection
