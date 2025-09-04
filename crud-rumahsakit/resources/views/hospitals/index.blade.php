@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Hospitals</h3>
        <a href="{{ route('hospitals.create') }}" class="btn btn-sm btn-success">Create</a>
    </div>
    <table class="table table-bordered mt-2">
        <thead><tr><th>ID</th><th>Name</th><th>Address</th><th>Email</th><th>Phone</th><th>Aksi</th></tr></thead>
        <tbody>
        @foreach($hospitals as $h)
        <tr>
            <td>{{ $h->id }}</td>
            <td>{{ $h->name }}</td>
            <td>{{ $h->address }}</td>
            <td>{{ $h->email }}</td>
            <td>{{ $h->phone }}</td>
            <td>
            <a href="{{ route('hospitals.edit',$h) }}" class="btn btn-sm btn-primary">Edit</a>
            <form action="{{ route('hospitals.destroy',$h) }}" method="post" style="display:inline">@csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $hospitals->links() }}
@endsection
