<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle ?? 'Default Title'  }}</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    @include('layouts.nav')
    @yield('content')
    @vite('resources/js/app.js')
    @include('sweetalert::alert')
    @stack('scripts')
    
</body>

</html>