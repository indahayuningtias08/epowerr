@extends('layouts.panel')
@section('content')
<div class="row">
    <div class="col-md-6">
        <h2 class="mb-4">Data Vendor</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('tambahvdor')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Tambah Vendor</a>
        <a href="{{route('export')}}" class="btn btn-secondary">Export Ke Excel</a>
    </div>
</div>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Vendor</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Up</th>
                <th>Telepon</th>
                <th>Email</th>
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
        ajax: "{{ route('vdor.list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_vendor', name: 'nama_vendor'},
            {data: 'alamat', name: 'alamat'},
            {data: 'kota', name: 'kota'},
            {data: 'up', name: 'up'},
            {data: 'telepon', name: 'telepon'},
            {data: 'email', name: 'email'},
            {
                data: 'aksi', 
                name: 'aksi', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>
@include('sweetalert::alert')
@endpush