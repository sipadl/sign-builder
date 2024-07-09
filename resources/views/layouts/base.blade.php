@include('./layouts/header')
<div class="content">
    <div class="container">
        <nav class="navbar navbar-expand navbar-dark bg-dark text-white">
            <div class="nav navbar-nav p-2 mr-auto">
                <a class="nav-item nav-link" href="#">Home</a>
                <a class="nav-item nav-link" href="#">Setting</a>
            </div>
        </nav>
        @yield('main')
    </div>
</div>
@include('./layouts.modal')
@include('./layouts.footer')
