@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))

@section('error-body')
    ログインからしばらく時間が経ってしまいました。
    <a href="/login" class="btn-border my-8">再度ログインしてください</a>
@endsection
