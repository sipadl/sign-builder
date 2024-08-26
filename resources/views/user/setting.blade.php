@extends('./layouts/base')
@section('title','Formia - Pengaturan')
@section('main')
<div class="row justify-content-center mt-2">
    <div class="col-md-12 col-sm-12 mx-0 p-0">
        <div class="card shadow-lg rounded">
            <div class="card-header text-center bg-gradient-primary text-light">
                <h2 class="font-weight-bold">Pengaturan</h2>
            </div>
            <div class="card-body p-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                        <a href="{{ route('password.change' )}}" class="stretched-link text-decoration-none text-dark">
                            <i class="fa fa-cogs mr-2" aria-hidden="true"></i> Ubah Password
                        </a>
                        <span class="badge badge-primary badge-pill">Edit</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                        <a href="{{ route('manage.user')}}" class="stretched-link text-decoration-none text-dark">
                            <i class="fa fa-user mr-2" aria-hidden="true"></i> Management User
                        </a>
                        <span class="badge badge-success badge-pill">New</span>
                    </li>
                    {{-- <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                        <a href="{{ route('setting.user')}}" class="stretched-link text-decoration-none text-dark">
                            <i class="fa fa-user mr-2" aria-hidden="true"></i> Management Role
                        </a>
                        <span class="badge badge-success badge-pill">New</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                        <a href="{{ route('setting.user')}}" class="stretched-link text-decoration-none text-dark">
                            <i class="fa fa-file mr-2" aria-hidden="true"></i> Management Hak Akses
                        </a>
                        <span class="badge badge-success badge-pill">New</span>
                    </li> --}}
                    {{-- <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                        <a href="{{ route('setting.user')}}" class="stretched-link text-decoration-none text-dark">
                            <i class="fa fa-user mr-2" aria-hidden="true"></i> Tambah User Baru
                        </a>
                        <span class="badge badge-success badge-pill">New</span>
                    </li> --}}
                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                        <a href="{{ route('logout') }}" class="stretched-link text-decoration-none text-dark">
                            <i class="fa fa-sign-out-alt mr-2"></i> Logout
                        </a>
                        <span class="badge badge-danger badge-pill">Exit</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom CSS */
    .bg-gradient-primary {
        background: linear-gradient(90deg, #007bff, #6610f2);
    }
    .card {
        border: none;
    }
    .card-header {
        border-bottom: 0;
    }
    .list-group-item:hover {
        background-color: #f8f9fa;
        transform: scale(1.02);
        transition: all 0.3s ease;
    }
    .badge-pill {
        font-size: 0.75rem;
        margin-left: 10px;
    }
</style>
@endsection
