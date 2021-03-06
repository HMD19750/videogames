<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MostAnticipated extends Component
{

    public $mostAnticipated = [];

    public function loadMostAnticipated()
    {

        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;
        $now = Carbon::now()->timestamp;

        $mostAnticipatedUnformatted = Cache::remember('most-anticipated', 7, function () use ($now, $afterFourMonths) {
            return Http::withHeaders([
                'Client-ID' => config('services.igdb.client_id'),
            ])
                ->withToken(config('services.igdb.token'))
                ->withBody(
                    'fields name,cover.url,follows,first_release_date,platforms.abbreviation,rating,rating_count,total_rating_count;
                        where total_rating_count != null
                        & platforms=(48,49,130,6)
                        &(first_release_date>' . $now . '
                        &first_release_date<' . $afterFourMonths . '
                        );
                        sort total_rating_count desc;
                        limit 4;;',
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')->json();
        });
        //    dump($this->formatForView($popularGamesUnformatted));
        $this->mostAnticipated = $this->formatForView($mostAnticipatedUnformatted);
    }


    public function render()
    {
        return view('livewire.most-anticipated');
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
