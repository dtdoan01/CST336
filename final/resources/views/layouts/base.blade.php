<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{--<meta name="description" content="">--}}
    {{--<meta name="author" content="">--}}
    {{--<link rel="icon" href="../../../../favicon.ico">--}}

    <title>
        {{ $title ?? 'Home' }} - {{ config('app.name') }}
    </title>

    @include('partials.styles')
</head>

<body>
    @yield('body')
    @include('partials.scripts')
</body>
</html>
