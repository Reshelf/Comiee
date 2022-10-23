@extends('app')

@section('title', '利用規約')

@section('content')
    @include('atoms._nav', ['tab' => 0]))

    <div class="container my-8">
        <h2 class="text-3xl font-semibold">利用規約</h2>
    </div>

    @include('atoms._footer')
@endsection
