@extends('layouts.panel')
@section('content')
<div class="row">
    <div class="col-md-6">
        <h2 class="mb-4">Data Client</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('tambahclient')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Tambah Client</a>
        <a href="{{route('export')}}" class="btn btn-secondary">Export Ke Excel</a>
    </div>
</div>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Client</th>
                <th>Alamat</th>
                <th>Up Invoice</th>
                <th>Up SPH</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection
@push('js')
<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('client.list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_client', name: 'nama_client'},
            {data: 'alamat', name: 'alamat'},
            {data: 'up_invoice', name: 'up_invoice'},
            {data: 'up_sph', name: 'up_sph'},
            {
                data: 'aksi', 
                name: 'aksi', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });

function confirmDelete() {
    return confirm("Apakah Anda Yakin Menghapus Data?");
}
</script>
@include('sweetalert::alert')
@endpush