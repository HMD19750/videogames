<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{

    public $search = '';
    public $searchResults = [];

    public function render()
    {

        $this->searchResults = Http::withHeaders([
            'Client-ID' => config('services.igdb.client_id'),
        ])
            ->withToken(config('services.igdb.token'))
            ->withBody(
                "search \"{$this->search}\";
                fields name,game.cover.url,game.slug;
                    limit 8;;",
                'text/plain'
            )
            ->post('https://api.igdb.com/v4/search')->json();



        return view('livewire.search-dropdown');
    }
}
