<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGameRequest;
use App\Platform;
use App\Game;
use App\Genre;

class AdminController extends Controller
{
    public function games()
    {
        $games = Game::with('genre')->get();

        return view('admin.games', compact('games'));
    }

    public function reports()
    {
        $gameCount = Game::count();
        $gamePrice = Game::avg('price');
        $genreCount = Genre::count();

        return view('admin.reports', compact('gameCount', 'gamePrice', 'genreCount'));
    }

    public function ajaxReportAverage()
    {
        $avgPriceGenre = Game::selectRaw('AVG(price) as averagePrice, genre_id ')
            ->groupBy('genre_id')
            ->with('genre')
            ->get();

        return $avgPriceGenre;
    }

    public function ajaxReportGenres()
    {
        return Genre::withCount('games')->get();
    }

    public function create()
    {
        return $this->edit(new Game());
    }

    public function store(CreateGameRequest $request)
    {
        /** @var Game $game */
        $game = Game::updateOrCreate([
            'slug' => $request->get('slug'),
        ], $request->all());

        $game->platforms()->sync($request->get('platforms'));

        if ($game->images()->count() === 0) {
            $game->images()->create([
                'url' => 'http://placehold.it/480x270&text=Placeholder',
            ]);
        }

        return redirect()->back();
    }

    public function edit(Game $game)
    {
        if ($game->exists) {
            $game->load('platforms');
        }

        $genres = Genre::all();
        $platforms = Platform::all();

        return view('admin.add', compact('genres', 'platforms', 'game'));
    }

    public function delete(Game $game)
    {
        $game->delete();

        return response(null, 204);
    }
}
