@include('./layouts/header')
<div class="content">
    @auth
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-item nav-link" href="{{ route('main') }}">
                        <i class="fas fa-home"></i> Home
                    </a>
                </div>
                <div class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('setting') }}">Setting</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </li>
                </div>
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
