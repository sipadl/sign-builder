@extends('layouts.base')

@section('title', 'Manajemen Pengguna')

@section('main')
<div class="mt-2">
    <div class="row justify-content-center">
        <div class="col-md-12 mx-0">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Manajemen Pengguna</h4>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('setting.user') }}" class="btn btn-success">
                            <i class="fas fa-user-plus"></i> Tambah Pengguna
                        </a>
                    </div>
                    @if(session('msg'))
                    <div class="col-md-12" id="alert-baru">
                            <div class="alert alert-success d-flex justify-content-between" id="alert_be">
                                <div class="">
                                    {{ session('msg') }}
                                </div>
                                <button type="button" class="btn-close" onclick="closealert()" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="col-md-12" id="alert-baru">
                            <div class="alert alert-danger d-flex justify-content-between" id="alert_be">
                                <div class="">
                                    {{ session('error') }}
                                </div>
                                <button type="button" class="btn-close" onclick="closealert()" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table id="userTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $index => $user)
                                <tr class="text-center">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @php
                                    switch ($user->id_group) {
                                        case '1':
                                            $role = 'Department Head';
                                            break;
                                        case '2':
                                            $role = 'Department Head';
                                            break;
                                        case '3':
                                            $role = 'Group Head';
                                            break;
                                        case '4':
                                            $role = 'Project Manager';
                                            break;
                                        case '0':
                                            $role = 'User';
                                            break;
                                        case '98':
                                            $role = 'Tim Incident';
                                            break;
                                        case '99':
                                            $role = 'Administrator';
                                            break;
                                        default:
                                            $role = 'Undefinded';
                                            break;
                                    }
                                    @endphp
                                    <td>{{ucfirst($role) }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('setting.user.edit', $user->id) }}" class="btn btn-warning mx-1 btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('setting.user.delete', $user->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
