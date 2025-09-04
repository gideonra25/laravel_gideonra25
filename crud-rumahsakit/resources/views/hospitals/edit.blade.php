@extends('layouts.app')
@section('content')
    <h3>Edit Hospital</h3>
    <form action="{{ route('hospitals.update', $hospital) }}" method="post">
        @csrf @method('PUT')
        <div class="mb-3"><label>Name</label><input name="name" value="{{ old('name', $hospital->name) }}" class="form-control" required></div>
        <div class="mb-3"><label>Address</label><input name="address" value="{{ old('address', $hospital->address) }}" class="form-control"></div>
        <div class="mb-3"><label>Email</label><input name="email" value="{{ old('email', $hospital->email) }}" class="form-control"></div>
        <div class="mb-3"><label>Phone</label><input name="phone" value="{{ old('phone', $hospital->phone) }}" class="form-control"></div>
        <button class="btn btn-primary">Update</button>
    </form>
@endsection
