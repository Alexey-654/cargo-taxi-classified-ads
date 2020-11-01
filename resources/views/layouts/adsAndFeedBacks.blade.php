<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @yield('metatag')
        @include('shared.head')
    </head>

    <body>
        @include('shared.topMenu')
            <main>
                <div class="container mt-5">
                    @yield('preamble')
                    @include('shared.adsIndex')
                    @yield('content')
                    @include('shared.colomnTemplateFeedbacks')
                </div>
            </main>
        @include('shared.footer')
    </body>
</html>
