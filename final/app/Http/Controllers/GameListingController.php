<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameListingController extends Controller
{
    public function list(Request $request)
    {
        $games = Game::query();

        if ($platforms = $request->get('platforms')) {
            $games->whereHas('platforms', function ($q) use ($platforms) {
                $q->where('slug', explode(',', $platforms));
            });
        }

        return $games->get();
    }

    public function view(Game $game)
    {
        $game->load('images');

        return view('game', compact('game'));
    }
}
