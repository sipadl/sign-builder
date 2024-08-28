@extends('layouts.base')

@section('main')
<div class="">
    <div class="row justify-content-center mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h2">{{ __('Profile') }}</div>

                <div class="card-body text-center">
                    <img src="{{ $user->avatar ? Storage::url($user->avatar) : 'https://via.placeholder.com/150' }}" class="rounded-circle mb-3" alt="avatar" width="150" height="150">

                    <h4>{{ $user->name }}</h4>
                    <p>{{ $user->email }}</p>

                    <p class="text-muted">{{ $user->address }}</p>
                    <p class="text-muted">{{ $user->phone_number }}</p>
                    <p>{{ $user->bio }}</p>

                    {{-- <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
