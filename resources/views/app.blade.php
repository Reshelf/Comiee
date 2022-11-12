<!DOCTYPE html>
<html class="dark">

<head>
    @include('atoms.meta')
    @yield('head')
    @include('atoms.google_analytics')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
    @yield('scripts')
</body>

</html>
