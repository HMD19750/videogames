<div wire:init="loadRecentlyReviewed" class="recently-reviewed-container space-y-12 mt-8">
    @forelse($recentlyReviewed as $game)
    <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
        <div class="relative flex-none">
            <a href="#">
                <img src="{{ $game['coverImageUrl'] }}" alt="game cover"
                    class="w-48 hover:opacity-75 transition ease-in-out duration-150">
            </a>
            @if(isset($game['rating']))
            <div id="review_{{ $game['slug'] }}" class="absolute bottom-0 text-xsright-0 w-16 h-16 bg-gray-900 rounded-full" style="right:-20px;bottom:-20px">

            </div>
            @endif
        </div>
        <div class="ml-12">
            <a href="#"
                class="block text-lg font-semibold leading-thight hover:text-gray-400 mt-4">{{ $game['name'] }}
            </a>
            <div class="text-gray-400 mt-1">
                {{ $game['platforms'] }}
            </div>
            <p class="mt-6 text-gray-400 hidden lg:block">
                {{$game['summary']}}
            </p>
        </div>
    </div>

    @empty
        @foreach(range(1,3) as $game)
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative flex-none">
                <div class="bg-gray-700 w-32 lg:w-48 h-40 lg:h-56">

                </div>

            </div>
            <div class="ml-6 lg:ml-12">
                <div class="inline-block text-lg rounded font-semibold leading-thight text-transparent bg-gray-700 mt-4">
                    Naam van het spel</div>

                <p class="mt-8 hidden lg:block space-y-4">
                    <span class="text-transparent bg-gray-700 rounded inline-block">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </span>
                    <span class="text-transparent bg-gray-700 rounded inline-block">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </span>
                    <span class="text-transparent bg-gray-700 rounded inline-block">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </span>
                </p>
            </div>
        </div>
        @endforeach
    @endforelse
</div>

@push('scripts')
    @include('_rating',[
        'event'=>'reviewGameWithRatingAdded'
    ])

@endpush
