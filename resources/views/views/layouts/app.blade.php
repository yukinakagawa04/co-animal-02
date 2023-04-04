<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'co-animal') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!--ナビ固定-->
        <style>
          .nav-container {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999;
            position: relative;
          }
          .page-header {
            margin-top: 4rem;
            position: relative;
            z-index: 1;
          }
        </style>
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 position: fixed">
            <div class="nav-container">
                @include('layouts.navigation')
            </div>
            <!-- Page Heading -->
            
            @if (isset($header))
                <header class="bg-white page-header">
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
    </body>
</html>
