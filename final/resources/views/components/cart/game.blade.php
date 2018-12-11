{{--<a href="{{ route('game.view', ['game' => $item->game->slug]) }}" class="link-unstyled">--}}
    <div class="game-listing media bg-secondary mb-2">
        <img class="mr-3" src="{{ $item->game->image_url }}" width="125" height="58">
        <div class="media-body">
            <div class="row">
                <div class="col-5">
                    <div class="mb-2">{{ $item->game->name }}</div>
                    @foreach ($item->game->platforms as $platform)
                        <i class="fa-lg {{ $platform->icon }} mr-2"></i>
                    @endforeach
                </div>
                <div class="col-1 d-flex align-items-center">
                    @if ($item->game->score >= 80)
                        <div class="badge badge-success">
                            {{ $item->game->score }}
                            <i class="fas fa-fw pt-1 pb-1 fa-lg fa-thumbs-up"></i>
                        </div>
                    @elseif ($item->game->score >= 60)
                        <div class="badge badge-warning">
                            {{ $item->game->score }}
                            <i class="fas fa-fw pt-1 pb-1 fa-lg fa-minus"></i>
                        </div>
                    @else
                        <div class="badge badge-danger">
                            {{ $item->game->score }}
                            <i class="fas fa-fw pt-1 pb-1 fa-lg fa-thumbs-down"></i>
                        </div>
                    @endif
                </div>
                <div class="col-2 d-flex justify-content-end align-items-center">
                    <span class="mr-3">
                        @if ($item->game->price > 0)
                            ${{ $item->game->price }}
                        @else
                            Free
                        @endif
                    </span>
                </div>
                <div class="col-4 d-flex justify-content-between align-items-center">
                    <div>
                        <input type="number" class="invisible form-control form-control-sm" style="width: 50px" value="{{ $item->quantity }}">
                    </div>
                    <a href="{{ route('cart.remove', $item->game->slug) }}" class="btn btn-danger btn-sm mr-3">Remove</a>
                </div>
            </div>
        </div>
    </div>
{{--</a>--}}
