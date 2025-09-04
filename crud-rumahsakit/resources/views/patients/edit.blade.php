@extends('layouts.app')
@section('content')
    <h3>Edit Patient</h3>
    <form action="{{ route('patients.update', $patient) }}" method="post">
        @csrf @method('PUT')
        <div class="mb-3"><label>Name</label><input name="name" class="form-control" value="{{ old('name', $patient->name) }}" required></div>
        <div class="mb-3"><label>Address</label><input name="address" class="form-control" value="{{ old('address', $patient->address) }}"></div>
        <div class="mb-3"><label>Phone</label><input name="phone" class="form-control" value="{{ old('phone', $patient->phone) }}"></div>
        <div class="mb-3"><label>Hospital</label>
        <select name="hospital_id" class="form-select" required>
            @foreach($hospitals as $h)
            <option value="{{ $h->id }}" {{ (old('hospital_id', $patient->hospital_id) == $h->id) ? 'selected' : '' }}>{{ $h->name }}</option>
            @endforeach
        </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
@endsection
