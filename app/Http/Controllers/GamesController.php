<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Output\NullOutput;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', []);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $game = Http::withHeaders([
            'Client-ID' => config('services.igdb.client_id'),
        ])
            ->withToken(config('services.igdb.token'))
            ->withBody(
                "fields *,
                cover.url,
                platforms.abbreviation,
                involved_companies.company.name,
                genres.name,
                websites.*,
                videos.*,
                screenshots.*,
                similar_games.cover.url,
                similar_games.name,
                similar_games.rating,
                similar_games.slug,
                similar_games.platforms.abbreviation;
                where slug=\"{$slug}\";",
                'text/plain'
            )
            ->post('https://api.igdb.com/v4/games')->json();

        abort_if(!$game, 404);
        //
        // dump($game[0]);
        //dd($this->formatGameForView($game[0]));

        return view('show', [
            'game' => $this->formatGameForView($game[0]),
        ]);
    }


    private function formatGameForView($game)
    {
        return collect($game)->merge([
            'coverImage' => isset($game['cover']) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : 'https://via.placeholder.com/264x352/111111',
            'involved_companies' => isset($game['involved_companies']) ? $game['involved_companies'][0]['company']['name'] : '',
            'genres' => isset($game['genres']) ? collect($game['genres'])->pluck('name')->implode(', ') : '',
            'platforms' => isset($game['platforms']) ? collect($game['platforms'])->pluck('abbreviation')->implode(', ') : '',
            'rating' => isset($game['rating']) ? round($game['rating']) : 0,
            'criticRating' => isset($game['aggregated_rating']) ? round($game['aggregated_rating']) : 0,
            'trailer' => isset($game['videos']) ? 'https://youtube.com/watch/' . $game['videos'][0]['video_id'] : Null,
            'summary' => isset($game['summary']) ? $game['summary'] : '',
            'screenshots' => isset($game['screenshots']) ? collect($game['screenshots'])->map(function ($screenshot) {
                return [
                    'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']),
                    'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url'])
                ];
            })->take(9) : [null],
            'similarGames' => isset($game['similar_games']) ? collect($game['similar_games'])->map(function ($game) {
                return collect($game)->merge([
                    'coverImageUrl' => isset($game['cover'])
                        ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])
                        : 'https://via.placeholder.com/264x352',
                    'rating' => isset($game['rating']) ? round($game['rating'])  : 0,
                    'platforms' => isset($game['platforms'])
                        ? collect($game['platforms'])->pluck('abbreviation')->implode(', ')
                        : null
                ]);
            })->take(6) : [null],
            'social' => isset($game['websites']) ? [
                'website' => collect($game['websites'])->first(),
                'facebook' => collect($game['websites'])->filter(function ($website) {
                    return Str::contains($website['url'], 'facebook');
                })->first(),
                'twitter' => collect($game['websites'])->filter(function ($website) {
                    return Str::contains($website['url'], 'twitter');
                })->first(),
                'instagram' => collect($game['websites'])->filter(function ($website) {
                    return Str::contains($website['url'], 'instagram');
                })->first(),

            ] : ['', '', '', '']
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
