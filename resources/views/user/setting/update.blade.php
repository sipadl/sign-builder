@extends('layouts.base')

@section('title', 'Update Pengguna')

@section('main')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Update Pengguna</h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('setting.user.update', $user->id) }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="role">Role</label>
                            <select name="id_group" class="form-control @error('id_group') is-invalid @enderror" id="id_group" required>
                                <option value="">Pilih Role</option>
                                <option value="99" {{ old('id_group', $user->id_group) == 99 ? 'selected' : '' }}>Administrator</option>
                                <option value="98" {{ old('id_group', $user->id_group) == 98 ? 'selected' : '' }}>Incident</option>
                                <option value="0" {{ old('id_group', $user->id_group) == 0 ? 'selected' : '' }}>User</option>
                                <option value="1" {{ old('id_group', $user->id_group) == 1 ? 'selected' : '' }}>Departement Head 1</option>
                                <option value="2" {{ old('id_group', $user->id_group) == 2 ? 'selected' : '' }}>Departement Head 2</option>
                                <option value="3" {{ old('id_group', $user->id_group) == 3 ? 'selected' : '' }}>Group Head</option>
                                <option value="4" {{ old('id_group', $user->id_group) == 4 ? 'selected' : '' }}>Project Manager</option>
                            </select>
                            @error('id_group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Update Pengguna
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
