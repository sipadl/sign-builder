@extends('./layouts/base') @section('main')
<div class="row d-flex justify-content-center mt-4">
<div class="card col-md-6 col-sm-12">
    <div class="card-header text-center">
        <h1>Pengaturan</h1>
    </div>
    <div class="card-body">
        <ul class="list-group">
            {{-- <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="#" class="stretched-link">Ubah Data</a>
            </li> --}}
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('password.change' )}}" class="stretched-link">
                   <i class="fa fa-cogs" aria-hidden="true"></i> Ubah Password</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('setting.user')}}" class="stretched-link">
                   <i class="fa fa-user" aria-hidden="true"></i> Tambah User Baru</a>
            </li>
            {{-- <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="#" class="stretched-link">Ubah Group Head</a>
            </li> --}}
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('logout') }}" class="stretched-link">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</div>
</div>


@endsection
