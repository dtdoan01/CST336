@extends('layouts.main')

@section('content')
    <h4>{{ $game->name }}</h4>
    <div class="row">
        <div class="col-8">
            <div id="carousel-game-gallery" class="carousel-custom carousel slide" data-ride="carousel" data-interval="false">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @foreach ($game->images as $image)
                        <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                            <img class="w-100 img-fluid" src="{{ $image->url }}">
                        </div>
                    @endforeach
                </div>

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach ($game->images as $image)
                        <li data-target="#carousel-game-gallery" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? ' active' : '' }}">
                            <img width="100" height="56" src="{{ $image->url }}">
                        </li>
                    @endforeach
                </ol>
            </div>

        </div>
        <div class="col-4">
            <div class="game-image">
                <img class="img-fluid" src="{{ $game->image_url }}">
            </div>

            <div class="game-description">
                <small>{{ $game->description }}</small>
            </div>

            <div class="game-info mt-3">
                <table>
                    <tr>
                        <td class="w-50 text-muted">All Reviews</td>
                        <td>{{ $game->votes }}</td>
                    </tr>
                    <tr>
                        <td class="w-50 text-muted">Release Date</td>
                        <td>{{ $game->created_at->toFormattedDateString() }}</td>
                    </tr>
                    <tr>
                        <td class="w-50 text-muted">Publisher</td>
                        <td>{{ $game->publisher }}</td>
                    </tr>
                </table>

            </div>

            <div class="game-genre mt-2">
                <div class="text-muted mb-1">Popular categories for this item</div>
                <div class="badge badge-primary">
                    <span class="h6">{{ $game->genre->name }}</span>
                </div>
            </div>

            <div class="mt-3 d-flex align-items-center justify-content-between">
                <div class="game-platforms">
                    @foreach ($game->platforms as $platform)
                        <i class="fa-lg {{ $platform->icon }} mr-2"></i>
                    @endforeach
                </div>

                <div class="bg-success rounded text-white p-1">
                    {{ currency($game->price) }}
                </div>
            </div>

            <div class="game-purchase mt-3">
                <a href="{{ route('cart.add', $game->slug) }}" class="btn btn-success btn-block">
                    <i class="fas fa-cart-plus"></i>
                    Add to Cart
                </a>
            </div>

            @auth
                <div class="mt-3">
                    <a href="{{ route('admin.edit', $game->slug) }}" class="btn btn-danger btn-block">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a>
                </div>
            @endauth
        </div>
    </div>
@endsection
