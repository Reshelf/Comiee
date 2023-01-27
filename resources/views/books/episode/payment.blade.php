@extends('app')

@section('content')
  処理中です...

  {{-- Stripe決済 --}}
  @include('atoms.stripe_script', [
      'book' => $book,
      'episode' => $episode,
  ])
@endsection
