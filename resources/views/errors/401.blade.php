@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))

@section('error-body')
    <p>有効な認証資格が不足していてリクエストが適用されません。</p>
    <a href="/login" class="btn-border my-8">再度ログインしてください</a>
@endsection
