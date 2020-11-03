@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-blue-500 uppercase tracking-widefont-semibold">Popular Games</h2>
    <div
        class="popular-games grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
        <!-- Game tegel -->
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="/tlou2.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px;bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        80%
                    </div>
                </div>
            </div>
            <a href="#" class="block text-base font-semibold leading-thight hover:text-gray-400 mt-8">Tombraider</a>
            <div class="text-gray-400 mt-1">
                Playstation 4
            </div>
        </div>
        <!-- Game tegel -->
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="/alyx.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px;bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        80%
                    </div>
                </div>
            </div>
            <a href="#" class="block text-base font-semibold leading-thight hover:text-gray-400 mt-8">Alyx</a>
            <div class="text-gray-400 mt-1">
                Playstation 4
            </div>
        </div>
        <!-- Game tegel -->
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="/animalcrossing.jpg" alt="game cover"
                        class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px;bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        80%
                    </div>
                </div>
            </div>
            <a href="#" class="block text-base font-semibold leading-thight hover:text-gray-400 mt-8">Animal
                Crossing</a>
            <div class="text-gray-400 mt-1">
                Playstation 4
            </div>
        </div>
        <!-- Game tegel -->
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="/avengers.jpg" alt="game cover"
                        class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px;bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        80%
                    </div>
                </div>
            </div>
            <a href="#" class="block text-base font-semibold leading-thight hover:text-gray-400 mt-8">Avengers</a>
            <div class="text-gray-400 mt-1">
                Nintendo
            </div>
        </div>
        <!-- Game tegel -->
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="/cyberpunk.jpg" alt="game cover"
                        class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px;bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        80%
                    </div>
                </div>
            </div>
            <a href="#" class="block text-base font-semibold leading-thight hover:text-gray-400 mt-8">Cyberpunk</a>
            <div class="text-gray-400 mt-1">
                Playstation 4
            </div>
        </div>
        <!-- Game tegel -->
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="/doom.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px;bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        80%
                    </div>
                </div>
            </div>
            <a href="#" class="block text-base font-semibold leading-thight hover:text-gray-400 mt-8">Doom</a>
            <div class="text-gray-400 mt-1">
                Xbox
            </div>
        </div>
        <!-- Game tegel -->
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="/ghost.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px;bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        80%
                    </div>
                </div>
            </div>
            <a href="#" class="block text-base font-semibold leading-thight hover:text-gray-400 mt-8">Ghost</a>
            <div class="text-gray-400 mt-1">
                Playstation 4
            </div>
        </div>

        <!-- Game tegel -->
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="/ff7.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px;bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        80%
                    </div>
                </div>
            </div>
            <a href="#" class="block text-base font-semibold leading-thight hover:text-gray-400 mt-8">Final Fantasy
                7</a>
            <div class="text-gray-400 mt-1">
                Playstation 4
            </div>
        </div>

        <!-- Game tegel -->
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="/luigi.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                    style="right:-20px;bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        80%
                    </div>
                </div>
            </div>
            <a href="#" class="block text-base font-semibold leading-thight hover:text-gray-400 mt-8">Luigi's
                mansion</a>
            <div class="text-gray-400 mt-1">
                Playstation 4
            </div>
        </div>
    </div> <!-- End popular games -->

    <!--Sectie recently  reviewed? -->
    <div class="flex flex-col lg:flex-row my-10">
        <div class="recently-reviewed w-fill lg:w-3/4 mr-0 lg:mr-32">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Reviewed</h2>
            <div class="recently-reviewed-container space-y-12 mt-8">
                <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                    <div class="relative flex-none">
                        <a href="#">
                            <img src="/avengers.jpg" alt="game cover"
                                class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                            style="right:-20px;bottom:-20px">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                80%
                            </div>
                        </div>
                    </div>
                    <div class="ml-12">
                        <a href="#"
                            class="block text-lg font-semibold leading-thight hover:text-gray-400 mt-4">Avengers</a>
                        <div class="text-gray-400 mt-1">Playstation 4</div>
                        <p class="mt-6 text-gray-400 hidden lg:block">
                            Officia dolor sint nostrud reprehenderit exercitation officia id nisi fugiat deserunt ad
                            eiusmod. Aliqua irure consectetur incididunt aute irure laboris dolore dolore aliqua
                            incididunt do consectetur quis deserunt. Anim in ea duis tempor cupidatat officia.

                        </p>
                    </div>
                </div>
                <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                    <div class="relative flex-none">
                        <a href="#">
                            <img src="/doom.jpg" alt="game cover"
                                class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                            style="right:-20px;bottom:-20px">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                80%
                            </div>
                        </div>
                    </div>
                    <div class="ml-12">
                        <a href="#" class="block text-lg font-semibold leading-thight hover:text-gray-400 mt-4">Doom</a>
                        <div class="text-gray-400 mt-1">Playstation 4</div>
                        <p class="mt-6 text-gray-400 hidden lg:block">
                            Officia dolor sint nostrud reprehenderit exercitation officia id nisi fugiat deserunt ad
                            eiusmod. Aliqua irure consectetur incididunt aute irure laboris dolore dolore aliqua
                            incididunt do consectetur quis deserunt. Anim in ea duis tempor cupidatat officia.

                        </p>
                    </div>
                </div>
                <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                    <div class="relative flex-none">
                        <a href="#">
                            <img src="/luigi.jpg" alt="game cover"
                                class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                            style="right:-20px;bottom:-20px">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                80%
                            </div>
                        </div>
                    </div>
                    <div class="ml-12">
                        <a href="#" class="block text-lg font-semibold leading-thight hover:text-gray-400 mt-4">Luigi's
                            mansion</a>
                        <div class="text-gray-400 mt-1">Playstation 4</div>
                        <p class="mt-6 text-gray-400 hidden lg:block">
                            Officia dolor sint nostrud reprehenderit exercitation officia id nisi fugiat deserunt ad
                            eiusmod. Aliqua irure consectetur incididunt aute irure laboris dolore dolore aliqua
                            incididunt do consectetur quis deserunt. Anim in ea duis tempor cupidatat officia.

                        </p>
                    </div>
                </div>

            </div>
        </div>
        <!--Most anticipated sidebar -->
        <div class="most-anticipated lg:w-1/4 mt-12 lg:mt-0">
            <h2 class=" text-blue-500 upppercase tracking-wide font-semibold">Most Anticipated</h2>
            <div class="most-anticipated-container space-y-10 mt-8">
                <div class="game flex">
                    <a href="#">
                        <img src="/cyberpunk.jpg" alt="game cover"
                            class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href="#" class="hoover:text-gray-300">Cyberpunk 2077</a>
                        <div class="text-gray-400 text-sm mt-1">Dec 18,2020</div>
                    </div>
                </div>

                <div class="game flex">
                    <a href="#">
                        <img src="/doom.jpg" alt="game cover"
                            class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href="#" class="hoover:text-gray-300">Doom</a>
                        <div class="text-gray-400 text-sm mt-1">Nov 18,2020</div>
                    </div>
                </div>

                <div class="game flex">
                    <a href="#">
                        <img src="/Alyx.jpg" alt="game cover"
                            class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href="#" class="hoover:text-gray-300">Afterlife</a>
                        <div class="text-gray-400 text-sm mt-1">Dec 1,2020</div>
                    </div>
                </div>

                <div class="game flex">
                    <a href="#">
                        <img src="/cyberpunk.jpg" alt="game cover"
                            class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href="#" class="hoover:text-gray-300">Cyberpunk 2077</a>
                        <div class="text-gray-400 text-sm mt-1">Dec 18,2020</div>
                    </div>
                </div>
            </div>

            <!--Coming soon sidebar -->

            <h2 class=" text-blue-500 upppercase tracking-wide font-semibold mt-10">Coming soon</h2>
            <div class="most-anticipated-container space-y-10 mt-8">
                <div class="game flex">
                    <a href="#">
                        <img src="/cyberpunk.jpg" alt="game cover"
                            class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href="#" class="hoover:text-gray-300">Cyberpunk 2077</a>
                        <div class="text-gray-400 text-sm mt-1">Dec 18,2020</div>
                    </div>
                </div>
                <div class="game flex">
                    <a href="#">
                        <img src="/doom.jpg" alt="game cover"
                            class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href="#" class="hoover:text-gray-300">Doom</a>
                        <div class="text-gray-400 text-sm mt-1">Nov 18,2020</div>
                    </div>
                </div>

                <div class="game flex">
                    <a href="#">
                        <img src="/Alyx.jpg" alt="game cover"
                            class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href="#" class="hoover:text-gray-300">Afterlife</a>
                        <div class="text-gray-400 text-sm mt-1">Dec 1,2020</div>
                    </div>
                </div>

                <div class="game flex">
                    <a href="#">
                        <img src="/cyberpunk.jpg" alt="game cover"
                            class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href="#" class="hoover:text-gray-300">Cyberpunk 2077</a>
                        <div class="text-gray-400 text-sm mt-1">Dec 18,2020</div>
                    </div>
                </div>


            </div>
        </div>

    </div>


</div><!-- End container -->





@endsection
