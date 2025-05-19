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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="fixed -z-10">
        <img src="/images/bg3.jpg" class="w-full object-cover">
    </div>

    <div class="min-h-scree">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <footer class="bg-gray-800 text-white p-8">
            <div
                class="container mx-auto flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <!-- Navigation Links -->
                <div class="flex flex-wrap gap-6 text-sm">
                    <a href="{{ url('dashboard') }}" class="hover:text-blue-400">Halaman Utama</a>
                    <a href="{{ route('learn.index') }}" class="hover:text-blue-400">Belajar</a>
                    <a href="{{ route('quiz.index') }}" class="hover:text-blue-400">Quiz</a>
                    <a href="{{ route('rank.index') }}" class="hover:text-blue-400">Carta</a>
                </div>

                <!-- Branding -->
                <div class="flex flex-col items-center">
                    <img src="/images/logo-cropped.png" alt="CoderBuddies Logo" class="w-20">
                    <p class="text-sm mt-2">&copy; 2025 CoderBuddies. Semua Hak Cipta Terpelihara.</p>
                </div>

                <!-- Copywriting -->
                <p class="text-center text-sm">
                    "Belajar, Bermain, dan Berkembang bersama CoderBuddies."
                </p>
            </div>
        </footer>

    </div>
</body>

</html>
