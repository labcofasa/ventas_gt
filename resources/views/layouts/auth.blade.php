<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/logo.svg') }}" type="image/x-icon">
        
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/datatables/datatables.min.css') }}">
        <script src="{{ asset('js/datatables/datatables.min.js') }}"></script>
        
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        <!-- Titulo del sitio -->
        <title>@yield('title') - {{ config('app.name') }}</title>
    </head>

    <body>
        <aside></aside>
        <main>
            @yield('content')
        </main>
        <footer></footer>

        <!-- Scripts -->
        <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>

</html>
