@if (count($data ?? []) > 0)
    <h3 class="mt-5 {{ $class ?? '' }}">{{ $title }}</h3>

    <table class="table">
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->name }}</td>
            </tr>
        @endforeach
    </table>
    {{ $slot }}
@endif
