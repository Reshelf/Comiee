@extends('app')

@section('title', __('本棚'))

@section('content')
  @include('atoms._nav', ['tab' => 3])

  <div class="mx-4 lg:mx-0">
    @include('atoms._error_card_list')
    @include('atoms.success')
  </div>

  <shelf-lists :lang='@json(app()->getLocale())' :user='@json($user)'
    :like-books='@json($likes)' :reads-books='@json($reads)'
    :bought-books='@json($boughts)'></shelf-lists>

  @include('atoms._footer')
@endsection
