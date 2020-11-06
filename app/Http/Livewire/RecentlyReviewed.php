<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;

        $now = Carbon::now()->timestamp;

        $this->recentlyReviewed = Cache::remember('recently-reviewed', 7, function () use ($before, $now) {

            return Http::withHeaders([
                'Client-ID' => config('services.igdb.client_id'),
            ])
                ->withToken(config('services.igdb.token'))
                ->withBody(
                    'fields name,cover.url,follows,first_release_date,platforms.abbreviation,rating,rating_count,summary,total_rating_count;
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
    }


    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
