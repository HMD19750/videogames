<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laracasts Video Games</title>
    <link rel="stylesheet" href="/css/main.css">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
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

                <livewire:search-dropdown>

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
