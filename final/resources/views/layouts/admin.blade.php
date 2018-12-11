@extends('layouts.base', ['title' => 'Admin'])

@section('body')
    <nav class="navbar navbar-light navbar-expand-lg bg-dark sticky-top">
        <a class="navbar-brand" href="{{ url('') }}">
            @include('components.logo', ['admin' => true])
        </a>

        <ul class="navbar-nav mt-2 mt-lg-0 text-uppercase">
            <li class="nav-item">
                <a class="nav-link text-nowrap" href="{{ route('store') }}">Store</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link text-nowrap">Log Out</a>
            </li>
        </ul>

        <form action="{{ route('search') }}" class="form-inline my-2 my-lg-0 ml-3 w-100">
            <div class="input-group input-group-sm w-100">
                <input class="form-control py-2 border border-right-0" type="search" name="q" placeholder="Enter a search term...">
                <div class="input-group-append">
                    <button class="btn btn-primary border" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="nav nav-sidebar sidebar-sticky col-md-2 d-none d-md-block bg-secondary">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin') }}">
                        <i class="fa fa-home fa-fw"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.games') }}">
                        <i class="fa fa-gamepad fa-fw"></i>
                        Games
                    </a>
                </li>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 p-4">
                @yield('content')
            </main>
        </div>
    </div>
@endsection
