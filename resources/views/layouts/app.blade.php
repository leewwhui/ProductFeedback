<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=jost:400,500,600&display=swap" rel="stylesheet"/>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="antialiased bg-alice-blue">

<main class="md:py-24 py-10 mx-auto min-h-screen">
    @yield('content')
</main>

@livewireScripts
</body>
</html>
