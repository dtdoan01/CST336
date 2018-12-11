<a href="{{ route('game.view', ['game' => $game->slug]) }}" class="link-unstyled">
    <div class="game-result media bg-secondary mb-2">
        <img class="mr-3" src="{{ $game->image_url }}" width="125" height="58">
        <div class="media-body">
            <div class="row">
                <div class="col-9">
                    <div class="mb-2">{{ $game->name }}</div>
                    @foreach ($game->platforms as $platform)
                        <i class="fa-lg {{ $platform->icon }} mr-2"></i>
                    @endforeach
                </div>
                <div class="col-1 d-flex align-items-center">
                    @if ($game->score >= 80)
                        <div class="badge badge-success">
                            {{ $game->score }}
                            <i class="fas fa-fw pt-1 pb-1 fa-lg fa-thumbs-up"></i>
                        </div>
                    @elseif ($game->score >= 60)
                        <div class="badge badge-warning">
                            {{ $game->score }}
                            <i class="fas fa-fw pt-1 pb-1 fa-lg fa-minus"></i>
                        </div>
                    @else
                        <div class="badge badge-danger">
                            {{ $game->score }}
                            <i class="fas fa-fw pt-1 pb-1 fa-lg fa-thumbs-down"></i>
                        </div>
                    @endif
                </div>
                <div class="col-2 d-flex justify-content-end align-items-center">
                    <span class="mr-3">
                        @if ($game->price > 0)
                            ${{ $game->price }}
                        @else
                            Free
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</a>
