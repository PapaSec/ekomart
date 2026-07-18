<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('EkoMart.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
    <style>
        /* Alpine cloak - hide until Alpine initializes */
        [x-cloak] {
            display: none !important;
        }

        /* Ultra-thin scrollbar */
        ::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #629D23;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #629D23;
        }

        /* Firefox */
        * {
            scrollbar-width: thin;
            scrollbar-color: #629D23 transparent;
        }
    </style>
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