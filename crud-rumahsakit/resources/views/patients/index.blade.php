@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h3>Patients</h3>
        <a href="{{ route('patients.create') }}" class="btn btn-sm btn-success">Create</a>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
        <label>Filter by Hospital:</label>
        <select id="filterHospital" class="form-select">
            <option value="">-- All --</option>
            @foreach($hospitals as $h)
            <option value="{{ $h->id }}">{{ $h->name }}</option>
            @endforeach
        </select>
        </div>
    </div>

    <table class="table table-bordered mt-3">
        <thead><tr><th>ID</th><th>Name</th><th>Hospital</th><th>Phone</th><th>Aksi</th></tr></thead>
        <tbody id="patients-table-body">
        @include('patients.partials.rows', ['patients' => $patients])
        </tbody>
    </table>

    {{ $patients->links() }}
@endsection

@push('scripts')
<script>
$(function(){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Requested-With': 'XMLHttpRequest' // pastikan server mengenali ini sebagai AJAX
        }
    });

    // Filter AJAX -> panggil route filter khusus yang hanya mengembalikan rows
    $('#filterHospital').change(function(){
        var hospital_id = $(this).val();
        $.get("{{ route('patients.filter') }}", { hospital_id: hospital_id }, function(html){
        $('#patients-table-body').html(html); // replace tbody dengan baris2 baru
        });
    });

    // Delete via AJAX (delegated)
    $(document).on('click', '.btn-delete-patient', function(e){
        e.preventDefault();
        if (!confirm('Yakin ingin menghapus?')) return;
        var id = $(this).data('id');
        $.ajax({
        url: '/patients/' + id,
        type: 'DELETE',
        success: function(res){
            if (res.success) {
            $('#patient-row-' + id).remove();
            }
        }
        });
    });
});
</script>
@endpush