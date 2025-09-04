@foreach($patients as $p)
<tr id="patient-row-{{ $p->id }}">
    <td>{{ $p->id }}</td>
    <td>{{ $p->name }}</td>
    <td>{{ $p->hospital->name ?? '-' }}</td>
    <td>{{ $p->phone }}</td>
    <td>
        <a href="{{ route('patients.edit', $p) }}" class="btn btn-sm btn-primary">Edit</a>
        <button class="btn btn-sm btn-danger btn-delete-patient" data-id="{{ $p->id }}">Delete</button>
    </td>
</tr>
@endforeach

@if($patients->isEmpty())
<tr><td colspan="5">Tidak ada data</td></tr>
@endif
