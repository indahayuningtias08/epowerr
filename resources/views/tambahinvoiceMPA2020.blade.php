@extends('layouts.panel')
@section('content')
<h3>Tambah Invoice MPA</h3>
<form method="post" action= "{{ route('simpaninvoicempa2020') }}">
  @csrf
  <div class="form-group">
    <label>Tgl.</label>
    <input type="date" name="tgl" class="form-control" placeholder="" required="">
  </div>
  <div class="form-group">
    <label>Kd Inv</label>
    <input type="text" name="kd_inv" class="form-control" placeholder="" required="" value="{{ $newCode }}" readonly>
  </div>
  <div class="form-group">
    <label for="client_id">Nama Client</label>
    <select name="client_id" id="client_id" class="form-control" required="" >
        <option value="" selected disabled>--Pilih Client--</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}" data-nama_client="{{ $client->nama_client }}" data-alamat="{{ $client->alamat }}" data-up="{{ $client->up_invoice}}">{{ $client->nama_client }}</option>
        @endforeach
    </select>
    <input type="hidden" name="nama_client" class="form-control" id="nama_client">
    <br>
    <label>Alamat Client</label>
    <input type="text" name="alamat_client" id="alamat_client" class="form-control" placeholder="Masukkan Alamat Client" required="">
    <br>
    <label>Kepada</label>
    <input type="text" name="up" id="up" class="form-control">
</div>

  <div class="form-group">
    <label>Item</label>
    <input type="text" name="item" class="form-control" placeholder="" required="">
  </div>  
  <div class="row">
    <!-- Left Column -->
    <div class="col-md-6">
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" required="">
            <label>Qty</label>
            <input type="number" name="qty" class="form-control" placeholder="" required="">
            <label>Satuan</label>
            <input type="text" name="satuan" class="form-control" placeholder="" required="">
            <label>Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" placeholder="" required="" oninput="updateJumlah()">
            <label>Jumlah</label>
            <input type="text" name="jumlah" id="jumlah" class="form-control" readonly>
        </div>
    </div>

    <!-- Right Column -->
    <div class="col-md-6">
        <div class="form-group">
            <label>Deskripsi Lainnya</label>
            <input type="text" name="deskripsi_lainnya" class="form-control" placeholder="Masukkan Deskripsi Lainnya" >
            <label>Qty</label>
            <input type="number" name="qty_lainnya" class="form-control" placeholder="" >
            <label>Satuan</label>
            <input type="text" name="satuan_lainnya" class="form-control" placeholder="" >
            <label>Harga</label>
            <input type="number" name="harga_lainnya" class="form-control" placeholder="" oninput="updateJumlahLainnya()">
            <label>Jumlah</label>
            <input type="text" name="jumlah_lainnya" id="jumlah_lainnya" class="form-control" readonly>
        </div>
    </div>
</div>
<div class="form-group">
    <label>Jumlah Total</label>
    <input type="text" name="jumlah_total" id="jumlahInput" class="form-control" oninput="calculatePPN()" readonly>
</div>
<div class="form-group">
    <label>PPN</label>
    <input type="text" name="ppn" id="ppnInput" class="form-control" readonly>
</div>
  <div class="form-group">
    <label>Total Invoice</label>
    <input type="text" name="total_invoice" class="form-control" placeholder="" required="">
  </div>
  <div class="form-group">
    <label>FP</label>
    <input type="text" name="fp" class="form-control"  >
  </div>
  <div class="form-group">
    <label>Status</label>
    <input type="text" name="status" class="form-control"  >
  </div>
  <div class="form-group">
    <label>Tgl Paid</label>
    <input type="date" name="tgl_paid" class="form-control" >
  </div>
  <div class="form-group">
    <label>No.BAST</label>
    <input type="text" name="no_bast" class="form-control"  >
  </div>
  <div class="form-group">
    <label>Jenis</label>
    <select name="jenis" class="form-control" id="selectField" >
        <option value="--Pilih Jenis--">--Pilih Jenis--</option>
        <option value="-">-</option>
        <option value="FPB">FPB</option>
        <option value="PO">PO</option>
        <option value="Kontrak">Kontrak</option>
        <option value="SPPK">SPPK</option>
        <option value="SPK">SPK</option>
    </select>
  </div>
  <div class="form-group">
    <label>Due Date</label>
    <input type="date" name="due_date" class="form-control"  >
  </div>
  
  <div class="form-group">
    <label for="bank_id">Nama Bank</label>
    <select name="bank_id" id="bank_id" class="form-control" required="" >
        <option value="" selected disabled>--Pilih Bank--</option>
        @foreach($banks as $bank)
            <option value="{{ $bank->id }}" data-nama_bank="{{ $bank->nama_bank }}" data-an="{{ $bank->an }}" data-ac="{{ $bank->ac}}">{{ $bank->nama_bank }}</option>
        @endforeach
    </select>
    <input type="hidden" name="nama_bank" class="form-control" id="nama_bank">
    <br>
    <label>A/N</label>
    <input type="text" name="an" id="an" class="form-control" required="">
    <br>
    <label>A/C</label>
    <input type="text" name="ac" id="ac" class="form-control">
</div>
  <div class="form-group">
    <label>No.FP</label>
    <input type="text" name="no_fp" class="form-control"  >
  </div>
 
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Simpan</button>
    <a href="mpa2020" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
  </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
   $(document).ready(function(){
        $('#client_id').change(function(){
            var selectedClient = $(this).find(':selected');
            $('#alamat_client').val(selectedClient.data('alamat'));
            $('#up').val(selectedClient.data('up'));
            $('#nama_client').val(selectedClient.data('nama_client')); // Set nilai nama_client pada input tersembunyi
        });
    });

    $(document).ready(function(){
        $('#bank_id').change(function(){
            var selectedBank = $(this).find(':selected');
            $('#an').val(selectedBank.data('an'));
            $('#ac').val(selectedBank.data('ac'));
            $('#nama_bank').val(selectedBank.data('nama_bank')); 
        });
    });

  function calculatePPN() {
    // Mengambil nilai dari input "jumlahInput"
    var jumlahTotalValue = document.getElementById("jumlahInput").value;

    // Memastikan nilai yang diambil adalah angka
    var parsedValue = parseFloat(jumlahTotalValue.replace(/,/g, ''));

    if (!isNaN(parsedValue)) {
        // Menghitung 11% dari nilai jumlah total
        var ppnResult = parsedValue * 0.11;

        // Menetapkan nilai hasil pada input "ppnInput" sebagai angka tanpa koma dan .00
        var formattedPPN = ppnResult.toFixed(0);
        document.getElementById("ppnInput").value = formattedPPN;
    } else {
        // Mengatur nilai input "ppnInput" menjadi kosong jika input "jumlahTotal" tidak valid
        document.getElementById("ppnInput").value = "";
    }
}

function updateJumlahLainnya() {
    var hargaLainnya = parseFloat(document.getElementsByName('harga_lainnya')[0].value) || 0;
    var jumlahLainnya = hargaLainnya;
    var jumlah = parseFloat(document.getElementById('harga').value) || 0;
    var jumlahTotal = jumlah + jumlahLainnya;

    document.getElementById('jumlah_lainnya').value = formatNumber(jumlahLainnya);
    document.getElementById('jumlahInput').value = formatNumber(jumlahTotal);

    calculatePPN(); // Calculate PPN after updating the values
  }

  function updateJumlah() {
    var harga = parseFloat(document.getElementById('harga').value) || 0;
    var jumlah = harga;
    var jumlahLainnya = parseFloat(document.getElementsByName('harga_lainnya')[0].value) || 0;
    var jumlahTotal = jumlah + jumlahLainnya;

    document.getElementById('jumlah').value = formatNumber(jumlah);
    document.getElementById('jumlahInput').value = formatNumber(jumlahTotal);

    calculatePPN(); // Calculate PPN after updating the values
  }

function formatNumber(angka) {
    return Number.isInteger(angka) ? angka : angka.toFixed(2);
}

function formatRupiah(angka) {
      var reverse = angka.toString().split('').reverse().join('');
      var ribuan = reverse.match(/\d{1,3}/g);
      var formatted = ribuan.join('.').split('').reverse().join('');
      return 'Rp. ' + formatted;
    }

    document.addEventListener('DOMContentLoaded', function() {
      var totalInvoiceInput = document.querySelector('input[name="total_invoice"]');
      
      totalInvoiceInput.addEventListener('input', function() {
        var inputValue = this.value.replace(/[^\d]/g, ''); // Hapus karakter non-digit
        this.value = formatRupiah(inputValue);
      });
    });

</script>

@endsection