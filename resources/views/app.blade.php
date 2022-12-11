<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('atoms.meta')
    @yield('head')
    @includeWhen(env('GA_ENABLE'), 'atoms.google_analytics')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
    @yield('scripts')
</body>

</html>
