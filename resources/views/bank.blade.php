@extends('layouts.panel')
@section('content')
<div class="row">
    <div class="col-md-6">
        <h2 class="mb-4">Data Bank</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('tambahbank')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Tambah Bank</a>
        <a href="{{route('export')}}" class="btn btn-secondary">Export Ke Excel</a>
    </div>
</div>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Bank</th>
                <th>A/N</th>
                <th>A/C</th>
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
        ajax: "{{ route('bank.list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_bank', name: 'nama_bank'},
            {data: 'an', name: 'an'},
            {data: 'ac', name: 'ac'},
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