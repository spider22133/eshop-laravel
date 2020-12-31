<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen">
@include('layouts.navigation')

<!-- Page Content -->
    <main>
        <div class="flex flex-col md:flex-row">
            @include('_partials.admin_side_nav')
            <div id="content" class="flex-1 bg-white py-24 px-8 md:pb-5">
                {{ $slot }}
            </div>
        </div>
    </main>
</div>
</body>
</html>
