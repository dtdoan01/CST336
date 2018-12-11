@if (isset($search))
    <div class="col-3">
        <div class="card bg-secondary">
            <div class="card-header">Genre</div>
            <div class="card-body">
                @foreach (App\Genre::all() as $genre)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"
                               class="custom-control-input search-filter"
                               name="genres[]"
                               id="genre-{{ $genre->id }}"
                               value="{{ $genre->id }}"{{ checked($genre->id, old('genres')) }}>
                        <label class="custom-control-label" for="genre-{{ $genre->id }}">{{ $genre->name }}</label>
                    </div>
                @endforeach
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-sm btn-danger reset-filter" data-name="genres[]">Reset All</button>
            </div>
        </div>

        <div class="card bg-secondary mt-3">
            <div class="card-header">Platform</div>
            <div class="card-body">
                @foreach (App\Platform::all() as $platform)
                    <div class="custom-checkbox custom-control custom-checkbox-icon pl-0">
                        <input type="checkbox"
                               class="custom-control-input search-filter"
                               name="platforms[]"
                               id="platform-{{ $platform->id }}"
                               value="{{ $platform->id }}"{{ checked($platform->id, old('platforms')) }}>

                        <label class="custom-control-label" for="platform-{{ $platform->id }}">
                            <i class="{{ $platform->icon }} fa-fw"></i>
                            {{ $platform->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-sm btn-danger reset-filter" data-name="platforms[]">Reset All</button>
            </div>
        </div>
    </div>
@endif
