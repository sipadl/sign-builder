@extends('layouts.base')

@section('title', 'Tambah Pengguna')

@section('main')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Tambah Pengguna Baru</h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('buatUser') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm">Konfirmasi Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="group">Group</label>
                            <select name="id_group" class="form-control @error('parent_group') is-invalid @enderror" id="parent_group" required>
                                <option value="">Pilih Group</option>
                                @foreach($group as $gr)
                                <option value="{{$gr->id}}">{{$gr->name}}</option>
                                @endforeach
                            </select>
                            @error('parent_group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="role">Role</label>
                            <select name="id_group" class="form-control @error('id_group') is-invalid @enderror" id="id_group" required>
                                <option value="">Pilih Role</option>
                                <option value="99">Administrator</option>
                                <option value="98">Incident</option>
                                <option value="0">User</option>
                                <option value="1">Departement Head 1</option>
                                <option value="2">Departement Head 2</option>
                                <option value="3">Group Head</option>
                                <option value="4">Project Manager</option>
                            </select>
                            @error('id_group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Tambah Pengguna
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('manage.user') }}" class="btn btn-link">Kembali ke Manajemen Pengguna</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
