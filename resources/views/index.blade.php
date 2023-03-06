@extends('app')

{{-- @php
  //Get IP Address of User in PHP
  $ip = ip2long($_SERVER['REMOTE_ADDR']);

  //call api
  $url = file_get_contents('http://www.geoplugin.net/json.gp?ip=' . $ip);

  //decode json data
  $getInfo = json_decode($url);
  dd($getInfo);
@endphp --}}
@section('content')
  @include('atoms._nav', ['tab' => 0])

  <div class="flex w-full mx-auto justify-center">
    <div class="w-full flex flex-col md:flex-row justify-around mx-auto px-4 lg:pt-4 lg:pb-8 lg:px-8 mb-8">

      <div class="lg:mb-4">
        @include('books.atoms.tabs')
        {{-- {{ strtolower($getInfo->geoplugin_countryCode) }} --}}
      </div>

      <div class="w-full md:w-4/5 rounded-lg md:ml-8">
        @include('atoms._error_card_list')
        @include('atoms.success')

        <books-lists :lang='@json(app()->getLocale())'></books-lists>
      </div>
    </div>
  </div>

  @include('atoms._footer')
@endsection
