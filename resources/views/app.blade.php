<!DOCTYPE html>
<html class="dark">

<head>
    @include('atoms.meta')
    @yield('head')
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
    @yield('scripts')
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>

</html>
