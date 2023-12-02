<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        @vite(['resources/css/theme.css', 'resources/js/theme.js'])

        <style>
            @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

            .font-family-montserrat {
                font-family: 'Montserrat', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased dark:bg-primary bg-headline font-family-montserrat">

    <!-- Top Bar Nav -->
    <div class="w-full dark:bg-main bg-headline border-b-2 dark:border-button sticky top-0 shadow-lg absolute z-50">
        <nav class="max-w-7xl mx-auto py-4">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

                @if(\Illuminate\Support\Facades\Auth::user())
                <div class="flex items-center space-x-4">
                    <a href="{{ route("dashboard") }}" class="flex items-center space-x-4">
                        @if(\Illuminate\Support\Facades\Auth::user()->profile_image)
                            <img class="w-10 h-10 rounded" src="{{ asset("storage/".\Illuminate\Support\Facades\Auth::user()->profile_image) }}" alt="Default avatar">
                        @else
                            <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            </div>
                        @endif
                        <div class="font-medium dark:text-white">
                            <div>{{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Joined in {{ \Illuminate\Support\Facades\Auth::user()->created_at->format("M Y") }}</div>
                        </div>
                    </a>
                </div>
                @else
                    <nav class="flex gap-2 items-center">
                        <a href="{{ route("login") }}" class="dark:text-headline">Login</a>
                        <span class="dark:text-headline">|</span>
                        <a href="{{ route("register") }}" class="dark:text-headline">Register</a>
                    </nav>
                @endif

                <div>
                    <a href="{{ route("page.index") }}">
                        <h1 class="text-primary text-2xl font-semibold">M1n H3in's Blog</h1>
                    </a>
                </div>

                <div class="flex items-center text-lg no-underline dark:text-headline pr-6">
                    <a class="" href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="pl-6" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="pl-6" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="pl-6 sun">
                        <i class="fas fa-sun"></i>
                    </a>
                    <a href="" class="pl-6 moon">
                        <i class="fas fa-moon"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    @if(request()->url() === route("page.index"))
        @include("pages.header")
    @endif

    @yield("content")

    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    </body>
</html>
