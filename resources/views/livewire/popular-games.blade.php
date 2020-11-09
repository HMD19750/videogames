<div wire:init="loadPopularGames"
    class="popular-games grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">

    @forelse($popularGames as $game)
        <x-game-card :game="$game"/>
    @empty
        @foreach(range(1,12) as $game)
            <div class="game mt-8">
                <div class="relative inline-block">
                    <div class="bg-gray-800 w-44 h-56"></div>
                </div>
                <div class="block text-transparent rounded text-lg leading-tight bg-gray-700 mt-2">Title</div>
                <div class="text-transparent mt-1 rounded bg-gray-700 inline-block">Platform PC, PS4</div>
            </div>
        @endforeach
    @endforelse

</div> <!-- End popular games -->
