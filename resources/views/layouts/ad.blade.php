<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @yield('metatag')
        @include('shared.head')
    </head>

    <body>
        @include('shared.topMenu')
        <div class="container mt-5">
            @yield('preamble')
            @yield('feedback')
        </div>
        @include('shared.footer')
    </body>
</html>
