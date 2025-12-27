<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Todo List')</title>
    <link href="{{ asset('public/build/assets/css/bootstrap.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/css/variable.scss')
    @vite('resources/js/app.js')
</head>

<body>
    <header>
        @yield('header')
    </header>
    <main>
        @yield('main')
    </main>
    <footer>
        @yield('footer')
    </footer>
</body>

</html>