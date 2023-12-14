@extends('layouts.panel')
@section('content')
<div class="row">
    <div class="col-md-6">
        <h2 class="mb-4">Data Invoice MPA 2020</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('tambahinvoicempa2020')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Tambah Invoice MPA</a>
        <a href="{{route('export')}}" class="btn btn-secondary">Export Ke Excel</a>
</div>

<div class="table-responsive" >
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Tgl.</th>
                <th>Kd Inv</th>
                <th>Nama Client</th>
                <th>Deskripsi</th>
                <th>Item</th>
                <th>Total Invoice</th>
                <th style="color: red;">FP</th>  
                <th style="color: red;">Status</th>
                <th style="color: red;">Tgl Paid</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detailModalBody">
                <!-- Detail data akan dimuat di sini -->
            </div>
@endsection
@push('js')
<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('mpa2020.list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'tgl', name: 'tgl'},
            {data: 'kd_inv', name: 'kd_inv'},
            {data: 'nama_client', name: 'nama_client'},
            {data: 'deskripsi', name: 'deskripsi'},
            {data: 'item', name: 'item'},
            {data: 'total_invoice', name: 'total_invoice'},
            {data: 'fp', name: 'fp'},
            {data: 'status', name: 'status'},
            {data: 'tgl_paid', name: 'tgl_paid' },
            {
                data: 'aksi', 
                name: 'aksi', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    // Add a click event listener to the DataTable rows
    $('.yajra-datatable tbody').on('click', 'tr', function () {
            // Get the data for the selected row
            var data = table.row(this).data();

            // Call your modal and pass the data to it
            showDetailModal(data);
        });

        // Function to display the detail modal
        function showDetailModal(data) {

            // Use the data to populate your modal
            $('#detailModalBody').html(`
                <div class="form-group">
                    <label for="alamatClient">Alamat Client:</label>
                    <textarea class="form-control" name="alamatClient">${data.alamat_client}</textarea>
                </div>
                <div class="form-group">
                    <label>Kepada:</label>
                    <input type="text" class="form-control" name="up" value="${data.up !== null ? data.up : '-'}">
                </div>
                <div class="form-group">
                    <label>No.BAST:</label>
                    <input type="text" class="form-control" name="no_bast" value="${data.no_bast !== null ? data.no_bast : '-'}">
                </div>
                <div class="form-group">
                    <label>Jenis:</label>
                    <input type="text" class="form-control" name="jenis" value="${data.jenis !== null ? data.jenis : '-'}">
                </div>
                <div class="form-group">
                    <label>No.:</label>
                    <input type="text" class="form-control" name="nomor" value="${data.nomor !== null ? data.nomor : '-'}">
                </div>
                <div class="form-group">
                    <label>Due date:</label>
                    <input type="date" class="form-control" name="due_date" value="${data.due_date !== null ? data.due_date : '-'}">
                </div>
                <div class="form-group">
                    <label>Jumlah Total:</label>
                    <input type="text" class="form-control" name="jumlah_total" value="${data.jumlah_total !== null ? data.jumlah_total : '-'}">
                </div>
                <div class="form-group">
                    <label>PPN:</label> 
                    <input type="text" class="form-control" name="ppn" value="${data.ppn !== null ? data.ppn : '-'}">
                </div>
                <div class="form-group">
                    <label>Nama Bank:</label>
                    <input type="text" class="form-control" name="nama_bank" value="${data.nama_bank}">
                </div>
                <div class="form-group">
                    <label>An:</label>
                    <input type="text" class="form-control" name="an" value="${data.an !== null ? data.an : '-'}">
                </div>
                <div class="form-group">
                    <label>Ac:</label>
                    <input type="text" class="form-control" name="ac" value="${data.ac !== null ? data.ac : '-'}">
                </div>
                <div class="form-group">
                    <label>No.FP:</label>
                    <input type="text" class="form-control" name="no_fp" value="${data.no_fp !== null ? data.no_fp : '-'}">
                </div>
            `);

        }
    });

    function confirmDelete() {
    return confirm("Apakah Anda Yakin Menghapus Data?");
}
</script>
@include('sweetalert::alert')
@endpush