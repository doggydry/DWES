<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('layouts.partials.nav')
    <div class="max-w-full mx-auto px-4">
        @yield('contenido')
    </div>
    @include('layouts.partials.footer')
</body>
</html>
