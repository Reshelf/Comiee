@extends('app')

@section('title', 'お問い合せ')

@section('content')
    @include('atoms._nav', ['tab' => 0]))

    <div class="container my-8">
        <h2 class="text-3xl font-semibold">お問い合せ</h2>
    </div>

    @include('atoms._footer')
@endsection
