<?php

namespace App\Http\Controllers;

use App\Game;
use App\Genre;
use App\Platform;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Game::inRandomOrder()
            ->take(12)
            ->get();

        $recommended = Game::with('platforms')
            ->recommended()
            ->inRandomOrder()
            ->take(4)
            ->get();

        $genres = Genre::orderBy('name')->get();
        $platforms = Platform::orderBy('name')->get();

        return view('welcome', compact('genres', 'platforms', 'featured', 'recommended'));
    }

    public function search(Request $request)
    {
        $sort = $request->get('sort', 'relevance');
        $request->merge(['sort' => $sort]);

        $request->flash();
        $search = $request->get('q') ?? '';

        /** @var $games LengthAwarePaginator $games */
        $query = Game::with('platforms')->search($search);

        $sortable = Game::sorts();
        if ($sort = $sortable->get($sort)) {
            $query->orderBy(array_get($sort, 'field'), array_get($sort, 'direction'));
        }

        if ($genres = $request->get('genres')) {
            $query->whereIn('genre_id', $genres);
        }

        if ($platforms = $request->get('platforms')) {
            $query->whereHas('platforms', function ($query) use ($platforms) {
                $query->whereIn('id', $platforms);
            });
        }

        $games = $query->paginate();
        $games->appends([
            'q' => $search,
            'sort' => $request->get('sort'),
            'genres' => $genres,
            'platforms' => $platforms,
        ]);

        return view('results', compact('search', 'games', 'sortable'));
    }

    public function store()
    {
        $games = Game::with('platforms')
            ->orderBy('name')
            ->paginate();
        $sortable = Game::sorts();

        return view('results', compact('games', 'sortable'));
    }

    public function recommended()
    {
        $games = Game::with('platforms')
            ->recommended()
            ->orderBy('score', 'desc')
            ->paginate();

        $category = 'Recommended';

        return view('results', compact('games', 'category'));
    }

    public function latest()
    {
        $games = Game::with('platforms')
            ->where('created_at', '>=', now()->subMonth())
            ->latest()
            ->paginate();

        $category = 'Latest Releases';

        return view('results', compact('games', 'category'));
    }

    public function genre(Genre $genre)
    {
        $games = $genre->games()
            ->with('platforms')
            ->orderBy('name')
            ->paginate();

        $category = 'Genre: '. $genre->name;

        return view('results', compact('games', 'category'));
    }

    public function platform(Platform $platform)
    {
        $games = $platform->games()
            ->with('platforms')
            ->orderBy('name')
            ->paginate();

        $category = 'Platform: '. $platform->name;

        return view('results', compact('games', 'category'));
    }
}
