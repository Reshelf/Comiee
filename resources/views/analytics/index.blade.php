@extends('app')
@section('content')
  @include('atoms._nav', ['tab' => 0])

  <analytics-dashboard :page-views="{{ $pageViews }}"></analytics-dashboard>
@endsection
