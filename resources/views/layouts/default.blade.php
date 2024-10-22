<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        @include('includes.head')
    </head>
    <body class="flex flex-col min-h-svh">
        <header>
            @include('includes.header')
        </header>
        <main class="grow">
            @yield('content')
        </main>
        <footer>
            @include('includes.footer')
        </footer>
    </body>
</html>