@include('./layouts/header')
<div class="content">
    @auth
    <div class="container">
        <nav class="navbar navbar-expand-sm  navbar-light bg-light shadow">
            <a class="navbar-brand mx-3" href="#">
                {{-- <i class="fa fa-home" aria-hidden="true"></i> --}}
                {{-- Logo Yokke --}}
                <img width="40" height="40" class="rounded-sm" src="{{ url('logo_yokke_1.jpeg') }}" alt="...">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-list" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse px-2" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('main')}}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('setting')}}">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            Setting
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="fa fa-user-circle mx-2" aria-hidden="true"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout')}}">
                                <i class="fa fa-sign-out mx-2" aria-hidden="true"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="mx-2">
            @yield('main')
        </div>
    </div>
    @endauth
    @guest
    <div class="container">
        <div class="">
            @yield('main')
            @endguest
    </div>
</div>
@include('./layouts.modal')
@include('./layouts.footer')
