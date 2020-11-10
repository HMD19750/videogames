<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;

        $now = Carbon::now()->timestamp;

        $recentlyReviewedUnformatted = Cache::remember('recently-reviewed', 7, function () use ($before, $now) {

            return Http::withHeaders([
                'Client-ID' => config('services.igdb.client_id'),
            ])
                ->withToken(config('services.igdb.token'))
                ->withBody(
                    'fields name,cover.url,follows,first_release_date,platforms.abbreviation,rating,rating_count,summary,total_rating_count,slug;
                    where total_rating_count != null
                    & platforms=(48,49,130,6)
                    &(first_release_date>' . $before . '
                    &first_release_date<' . $now . '
                    &total_rating_count>5);
                    sort total_rating_count desc;
                    limit 3;;',
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')->json();
        });

        //    dump($this->formatForView($popularGamesUnformatted));
        $this->recentlyReviewed = $this->formatForView($recentlyReviewedUnformatted);

        collect($this->recentlyReviewed)->filter(function ($game) {
            return $game['rating'];
        })->each(function ($game) {
            $this->emit('reviewGameWithRatingAdded', [
                'slug' => 'review_' . $game['slug'],
                'rating' => $game['rating'] / 100
            ]);
        });
    }



    public function render()
    {
        return view('livewire.recently-reviewed');
    }


    protected function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                'rating' => isset($game['rating']) ? round($game['rating']) : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', ')

            ]);
        })->toArray();
    }
}
