@extends('layouts.base')
@section('title', 'Login')
@section('main')
<style>
    .login-box {
        width: 400px;
        height: 300px;
        margin: 100px auto;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: white;
    }
</style>
<div class="login-box">
    <h2 class="text-center">Login</h2>
    <hr>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group mt-4 text-end">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>
@endsection
