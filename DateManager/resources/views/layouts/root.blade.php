<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gestor de Citas @yield('module')</title>

    <script src="{{asset('js/app.js')}}" defer></script>

    @yield('scripts')

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    @yield('styles')

</head>
@yield('body')
</html>
