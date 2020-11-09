<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{

    public $popularGames = [];

    public function loadPopularGames()
    {
        $popularGamesUnformatted = Cache::remember('popular-games', 7, function () {

            $before = Carbon::now()->subMonths(2)->timestamp;
            $after = Carbon::now()->addMonths(2)->timestamp;

            return Http::withHeaders([
                'Client-ID' => config('services.igdb.client_id'),
            ])
                ->withToken(config('services.igdb.token'))
                ->withBody(
                    'fields name,rating,cover.url,follows,first_release_date,platforms.abbreviation,total_rating_count,slug;
                    where total_rating_count != null
                    & platforms=(48,49,130,6)
                    &first_release_date>' . $before . '
                    &first_release_date<' . $after . ';
                     sort total_rating_count desc;
                    limit 12;;',
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')->json();
        });

        $this->popularGames = $this->formatForView($popularGamesUnformatted);
    }

    public function render()
    {
        return view('livewire.popular-games');
    }

    protected function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                'rating' => isset($game['rating']) ? round($game['rating']) . '%' : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', ')

            ]);
        })->toArray();
    }
}
