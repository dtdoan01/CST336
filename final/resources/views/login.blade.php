@extends('layouts.base', ['title' => 'Login'])

@section('body')
    <div class="text-center mt-5 mx-auto w-25">
        <div class="login-header">
            <i class="fab fa-steam fa-7x"></i>
            <h1 class="h3 mb-3 font-weight-normal">
                {{ config('app.name') }}
                <br>
                <small class="text-muted">Login Required</small>
            </h1>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger text-left">
                <h4 class="alert-heading">Whoops!</h4>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="post" class="form-signin">
            @csrf

            {{--<label for="email">Email address</label>--}}
            <div class="input-group mb-1">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-primary">
                        <i class="fas fa-envelope fa-fw"></i>
                    </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="admin@example.com" value="{{ old('email', 'admin@example.com') }}" required autofocus>
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-primary">
                        <i class="fas fa-key fa-fw"></i>
                    </span>
                </div>
                <input type="password" name="password" class="form-control" placeholder="secret" required>
            </div>

            <button class="mt-3 btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

            <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
        </form>
    </div>
@endsection
