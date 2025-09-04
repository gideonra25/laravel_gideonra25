@extends('layouts.app')
@section('content')
    <h3>Create Patient</h3>
    <form action="{{ route('patients.store') }}" method="post">
        @csrf
        <div class="mb-3"><label>Name</label><input name="name" class="form-control" value="{{ old('name') }}" required></div>
        <div class="mb-3"><label>Address</label><input name="address" class="form-control" value="{{ old('address') }}"></div>
        <div class="mb-3"><label>Phone</label><input name="phone" class="form-control" value="{{ old('phone') }}"></div>
        <div class="mb-3"><label>Hospital</label>
        <select name="hospital_id" class="form-select" required>
            <option value="">-- Pilih --</option>
            @foreach($hospitals as $h)
            <option value="{{ $h->id }}" {{ old('hospital_id') == $h->id ? 'selected' : '' }}>{{ $h->name }}</option>
            @endforeach
        </select>
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
@endsection
