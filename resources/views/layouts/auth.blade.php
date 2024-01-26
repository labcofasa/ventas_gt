<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') - {{ config('app.name') }}</title>

        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>

    <body>
        <aside></aside>
        <main>
            @yield('content')
        </main>
        <footer></footer>
    </body>

</html>
