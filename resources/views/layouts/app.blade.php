<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('EkoMart.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body>
    <!-- Topbar -->
    <x-frontend.topbar />

    <!-- Header -->
    <x-frontend.header />

    <!-- Bottom Navigation -->

    <!-- Main Content -->
    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <!-- Cookie Consent -->

    <!-- Footer -->
    @livewireScripts
    @fluxScripts
</body>

</html>