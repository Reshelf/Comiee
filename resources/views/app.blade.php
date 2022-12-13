<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="dark">

<head>
    @include('atoms.meta')
    @yield('head')
    @includeWhen(env('GA_ENABLE'), 'atoms.google_analytics')
    @yield('header-scripts')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
    @yield('footer-scripts')
</body>

</html>
