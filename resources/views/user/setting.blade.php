@extends('./layouts/base') @section('main')

<div class="card">
    <div class="card-header text-center">
        <h1>Pengaturan</h1>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="#" class="stretched-link">Ubah Data</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="#" class="stretched-link">Ubah Password</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="#" class="stretched-link">Tambah User Baru</a>
            </li>
            {{-- <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="#" class="stretched-link">Ubah Group Head</a>
            </li> --}}
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="#" class="stretched-link">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</div>

@endsection
