<div wire:init="loadMostAnticipated" class="most-anticipated-container space-y-10 mt-8">
    @forelse($mostAnticipated as $game)
        <div class="game flex">
            <a href="#">
                <img src="{{ Str::replaceFirst('thumb','cover_small',$game['cover']['url']) }}" alt="game cover"
                    class="w-16 hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="ml-4">
                <a href="#" class="hoover:text-gray-300">{{ $game['name'] }}</a>
                <div class="text-gray-400 text-sm mt-1">{{ Carbon\Carbon::parse($game['first_release_date'])->format('d M, Y') }}</div>
            </div>
        </div>

    @empty
        @foreach(range(1,4) as $game)
            <div class="game flex">
                <div class="bg-gray-800 w-16 h-24"></div>
                <div class="ml-4">
                    <div class="text-transparent bg-gray-700 rounded leading-tight">Name comeshere</div>
                    <div class="inline-block text-transparent bg-gray-700 rounded mt-4 text-sm">Sep 20,2020</div>
                </div>
            </div>
        @endforeach
    @endforelse

</div>
