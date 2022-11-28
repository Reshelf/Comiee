<p>Starbookに登録いただきありがとうございます！</p>

@foreach ($introLines as $line)
    <p>{{ $line }}</p>
@endforeach

<br>
<p>{{ $actionUrl }}</p>
<br>

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
    <p>{{ $line }}</p>
@endforeach


{{-- Salutation --}}
@if (!empty($salutation))
    <p> {{ $salutation }}</p>
@else
    <p>Starbooks運営チーム</p>
@endif
