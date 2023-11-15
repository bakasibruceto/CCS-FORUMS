<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/highlight.min.js"></script>

    <!-- Include a11y-dark theme -->
    <link rel="stylesheet" href="{{ asset('path/to/highlight.js/styles/a11y-dark.css') }}">
    {{-- <link rel="icon" href="favicon.ico" type="image"> --}}
    <!-- Scripts -->

    @vite(['resources/css/app.css', 'resources/css/a11y-dark.css','resources/js/app.js'])

    <!-- Styles -->

    {{-- <script src="{{ asset('path/to/highlight.js') }}"></script> --}}

    {{-- <!-- Include a11y-dark theme -->
    <link rel="stylesheet" href="{{ asset('css/a11y-dark.css') }}"> --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>




    @livewireStyles
</head>

<body class="font-sans antialiased ">
    <x-banner />

    <div class="min-h-screen bg-gray-200">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow fixed">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
