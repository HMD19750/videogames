<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

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
        //dump($game);

        return view('show', [
            'game' => $this->formatGameForView($game[0]),
        ]);
    }


    private function formatGameForView($game)
    {
        return collect($game)->merge([
            'coverImage' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
            'involved_companies' => $game['involved_companies'][0]['company']['name'],
            'genres' => collect($game['genres'])->pluck('name')->implode(', '),
            'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            'rating' => isset($game['rating']) ? round($game['rating']) : '0',
            'criticRating' => isset($game['aggregated_rating']) ? round($game['aggregated_rating']) : '0',
            'trailer' => 'https://youtube.com/watch/' . $game['videos'][0]['video_id'],
            'screenshots' => collect($game['screenshots'])->map(function ($screenshot) {
                return [
                    'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']),
                    'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url'])
                ];
            })->take(9),
            'similarGames' => collect($game['similar_games'])->map(function ($game) {
                return collect($game)->merge([
                    'coverImageUrl' => isset($game['cover'])
                        ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])
                        : 'https://via.placeholder.com/264x352',
                    'rating' => isset($game['rating']) ? round($game['rating'])  : null,
                    'platforms' => isset($game['platforms'])
                        ? collect($game['platforms'])->pluck('abbreviation')->implode(', ')
                        : null
                ]);
            })->take(6),
            'social' => [
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
            ]

        ]);
        // dump($temp);

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
