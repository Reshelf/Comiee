@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))

@section('error-body')
    <p>指定されたページが見つかりませんでした。</p>
    <a href="/" class="btn-border my-8">トップページに戻る</a>
@endsection
