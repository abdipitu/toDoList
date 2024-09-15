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

        <!-- Styles -->
        <style>
            input[type="date"]::-webkit-datetime-edit-year-field:not([aria-valuenow]),
            input[type="date"]::-webkit-datetime-edit-month-field:not([aria-valuenow]),
            input[type="date"]::-webkit-datetime-edit-day-field:not([aria-valuenow]) {
                color: transparent;
            }
        </style>
    </head>
    <body class="font-sans">
        <div class="h-screen bg-zinc-800">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Page Sidebar -->
                <div class="w-1/5">
                    <div class="fixed">
                        <div class="pr-7">
                            <a href="/today">Today 📍</a>
                            <a href="/home" class="flex justify-between">
                                <p class="font-semibold">My project</p>
                                <x-arrow />
                            </a>
                        </div>
                    </div>
                </div>
                
    
                <!-- Page Content -->
                <div class="overflow-hidden sm:rounded-lg w-4/5">
                    {{ $slot }}
                </div>
            </div>

        </div>
    </body>
</html>
