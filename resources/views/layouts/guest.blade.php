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

    <header class="w-full flex justify-center bg-gray-800 py-6 px-8 h-16 border-b border-gray-600">


        <div class="w-3/4">
            <div class="flex items-center h-full">

                <div class="shrink-0 flex items-center">
                    <a href="/">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex text-gray-200">

                    <a class="px-2" href="{{route('home.index')}}">Home</a>

                    <a class="px-2" href="{{ route('projects') }}">Projects</a>

                    <a class="px-2" href="{{route('contact.index')}}">Contact</a>

                </div>
            </div>
        </div>


        <a class="flex items-center text-gray-200" href="login" in>Log In</a>


    </header>


    <body class="font-sans text-gray-900 antialiased">

        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-700">
                {{ $slot }}
        </div>

    </body>

    <footer class="w-full flex items-center text-white bg-gray-800 py-2 px-4">
        <p>Copyright</p>
    </footer>
</html>
