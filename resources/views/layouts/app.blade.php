<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laracasts Video Games</title>
    <link rel="stylesheet" href="/css/main.css">
    @livewireStyles
 </head>

<body class="bg-gray-900 text-white">
    <header class="border-b ">
        <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
            <div class="flex mt-6 lg:mt-0 flex-col lg:flex-row -bottom-0 items-center">
                <!-- Logo -->
                <a href="/">
                    <img src="/pure-negative-logo.svg" alt="laracasts" class="w-32 flex-none">
                </a>
                <!-- left menu -->
                <ul class="flex ml-0 lg:ml-16 space-x-8">
                    <li><a href="#" class="hover:text-gray-400">Games</a></li>
                    <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                    <li><a href="#" class="hover:text-gray-400">Coming soon</a></li>
                </ul>
            </div>
            <!-- Right part of navigation bar -->
            <div class="flex items-center mt-6 lg:mt-0">
                <!-- Search -->
                <div class="relative">
                    <input type="text"
                        class="pl-8 bg-gray-800 text-sm rounded-full  focus:outline-none focus:shadow-outline w-64 px-3 py-1"
                        placeholder="Search...">
                    <div class="absolute top-0 flex items-center h-full ml-2">
                        <svg class="fill-current text-gray-400 w-4" viewbox="0 0 24 24">
                            <path class="heroicon-ui"
                                d="M16.32 14.915.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z" />
                            </svg>
                    </div>
                </div>
                <div class="div ml-6">
                    <a href="#">
                        <img src="/avatar.jpg" alt="avatar" class="rounded-full w-8">
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            Powered by <a href="#" class="underline hover:text-gray-400">IGDB API </a>
        </div>
    </footer>
    @livewireScripts
    <script src="/js/app.js"></script>
    @stack('scripts')
</body>

</html>
