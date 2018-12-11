@extends('layouts.main', ['fluid' => true])

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">

    <div class="row">
        <div class="col-auto offset-1">
            <h6>Discover</h6>
            <nav class="nav flex-column">
                <a class="text-info" href="{{ route('store.recommended') }}">
                    <i class="fas fa-thumbs-up"></i>
                    Recommendations
                </a>

                <a class="text-info" href="{{ route('store.latest') }}">
                    <i class="fab fa-gripfire"></i>
                    New Releases
                </a>
            </nav>

            <h6 class="mt-3">Browse by Platform</h6>
            <nav class="nav flex-column">
                @foreach ($platforms as $platform)
                    <a class="text-info" href="{{ route('store.platform', $platform->slug) }}">
                        <i class="{{ $platform->icon }} fa-fw"></i>
                        {{ $platform->name }}
                    </a>
                @endforeach
            </nav>

            <h6 class="mt-3">Browse by Genre</h6>
            <nav class="nav flex-column">
                @foreach ($genres as $genre)
                    <a class="text-info" href="{{ route('store.genre', $genre->slug) }}">
                        {{ $genre->name }}
                    </a>
                @endforeach
            </nav>
        </div>

        <div class="col w-100">
            <h4>Popular</h4>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($recommended as $game)
                        <li data-target="#carouselExampleIndicators"
                            data-slide-to="{{ $loop->index }}"
                            class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                </ol>

                <div class="carousel-inner">
                    @foreach ($recommended as $game)
                        <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                            <div class="carousel-item-container">
                                <a href="{{ route('game.view', $game->slug) }}" class="link-unstyled">
                                    <img class="d-block w-100" src="{{ $game->image_url }}">
                                    <div class="caption">
                                        @foreach ($game->platforms as $platform)
                                            <i class="{{ $platform->icon }}"></i>
                                        @endforeach
                                        {{ currency($game->price) }}
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <h4>Featured</h4>
            <div class="d-flex flex-row flex-wrap justify-content-center">
                @foreach ($featured as $game)
                    <div class="w-25 p-2">
                        <div class="gallery-container">
                            <a href="{{ route('game.view', $game->slug) }}" class="link-unstyled">
                                <img src="{{ $game->image_url }}" class="img-fluid">
                                <div class="caption">
                                    {{ currency($game->price) }}
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-1"></div>
    </div>

@endsection
