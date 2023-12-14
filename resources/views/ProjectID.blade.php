@extends('layouts.panel')
@section('content')
<div class="row">
    <div class="col-md-6">
        <h2 class="mb-4">Data Project ID</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('tambahprojectid')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Tambah Project ID</a>
        <a href="{{route('export')}}" class="btn btn-secondary">Export Ke Excel</a>
    </div>
</div>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Project ID</th>
                <th>Nama Project</th>
                <th>HPP</th>
                <th>RAB</th>
                <th>Nama Client</th>
                <th>Alamat Client</th>
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
        ajax: "{{ route('projectid.list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'project_id', name: 'project_id'},
            {data: 'nama_project', name: 'nama_project'},
            {data: 'hpp', name: 'hpp'},
            {data: 'rab', name: 'rab'},
            {data: 'nama_client', name: 'nama_client'},
            {data: 'alamat_client', name: 'alamat_client'},
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