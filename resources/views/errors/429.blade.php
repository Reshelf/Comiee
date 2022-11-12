@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))

@section('error-body')
    <p>短時間に制限以上のリクエストをしています！</p>
    <p>時間をおいて再度操作をお願いします。</p>
    <a href="/" class="btn-border my-8">トップページへ</a>
@endsection
