<!DOCTYPE html>
<html class="dark">

<head>
    @include('_patials.meta')

    @vite('resources/sass/app.scss')

    @yield('head')
</head>

<body>
    <div id="app">
        {{-- @include('_patials._error_toast') --}}
        @yield('content')
    </div>

    @vite('resources/js/app.js')
    @yield('scripts')
</body>

</html>
