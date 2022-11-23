@extends('app')

@section('title', 'プライバシーポリシー')

@section('description')
    <meta name="description" itemprop="description" content="Starbooksのプライバシーポリシーページです。">
    <meta property="og:description" content="Starbooksのプライバシーポリシーページです。">
    <meta name="twitter:description" content="Starbooksのプライバシーポリシーページです。">
@endsection

@section('content')
    @include('atoms._nav', ['tab' => 0])

    <div class="container my-8">
        <h2 class="text-3xl font-semibold">プライバシーポリシー</h2>
    </div>

    @include('atoms._footer')
@endsection
