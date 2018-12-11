@extends('layouts.admin')

@section('content')
    <a class="btn btn-success w-100" href="{{ route('admin.add') }}">Add Game</a>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Score</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            @foreach($games as $game)
                <tr id="game-{{ $game->id }}">
                    <td>{{ $game->id }}</td>
                    <td>{{ $game->name }}</td>
                    <td>{{ $game->publisher }}</td>
                    <td>{{ $game->genre->name }}</td>
                    <td>{{ $game->score }}</td>
                    <td>{{ currency($game->price) }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $game->slug) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $game->id }}, '{{ route('admin.delete', $game->slug) }}')">
                            <i class="fa fa-trash"></i>
                        </button>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        function confirmDelete(id, url) {
            if (! confirm("Are you sure you want to delete this product?"))
                return;

            $.ajax({
                url: url,
                type: 'DELETE',
                success: function(result) {
                    console.log('success');
                    $('#game-' + id).remove();
                    // Do something with the result
                }
            });
        }
    </script>
@endsection
