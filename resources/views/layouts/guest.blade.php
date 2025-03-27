<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Bocao') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-light-gray">

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-light-gray">

            <div class="w-full sm:max-w-lg mt-12 px-8 py-6 bg-white shadow-lg rounded-lg">
                
                <h2 class="text-center text-teal-600 text-3xl font-semibold mb-6">
                    <i class="fas fa-utensils mr-2"></i> Bienvenido a Bocao
                </h2>

                @if (session()->has('success'))
                    <div class="bg-green-100 text-green-800 p-4 mb-4 rounded-md shadow-md">
                        {{ session('success') }}
                    </div>
                @endif

                {{ $slot }}

             
            </div>
        </div>

    </body>
</html>
