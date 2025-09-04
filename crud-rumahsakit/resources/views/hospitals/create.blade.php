@extends('layouts.app')
@section('content')
    <h3>Create Hospital</h3>
    <form action="{{ route('hospitals.store') }}" method="post">
        @csrf
        <div class="mb-3"><label>Name</label><input name="name" class="form-control" required></div>
        <div class="mb-3"><label>Address</label><input name="address" class="form-control"></div>
        <div class="mb-3"><label>Email</label><input name="email" class="form-control"></div>
        <div class="mb-3"><label>Phone</label><input name="phone" class="form-control"></div>
        <button class="btn btn-primary">Save</button>
    </form>
@endsection
