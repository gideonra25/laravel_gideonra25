@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Login</h5>
            <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" value="{{ old('username') }}" class="form-control" required>
                @error('username') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button class="btn btn-primary">Login</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
