<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {

        $now = Carbon::now()->timestamp;

        $comingSoonUnformatted = Cache::remember('coming-soon', 7, function () use ($now) {
            return Http::withHeaders([
                'Client-ID' => config('services.igdb.client_id'),
            ])
                ->withToken(config('services.igdb.token'))
                ->withBody(
                    'fields name,cover.url,follows,first_release_date,platforms.abbreviation,rating,rating_count;
                        where total_rating_count != null
                        & platforms=(48,49,130,6)
                        &(first_release_date>'
                        . $now .
                        ');
                        sort first_release_date asc;
                        limit 4;;',
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')->json();
        });

        //    dump($this->formatForView($popularGamesUnformatted));
        $this->comingSoon = $this->formatForView($comingSoonUnformatted);
    }
    public function render()
    {
        return view('livewire.coming-soon');
    }

    protected function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']),
                'first_release_date' => Carbon::parse($game['first_release_date'])->format('d M, Y'),
            ]);
        })->toArray();
    }
}
