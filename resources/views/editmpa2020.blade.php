@extends('layouts.panel')
@section('content')
<h3>Edit Data MPA 2020</h3>
@foreach($mpa2020 as $s)
<form method="post" action= "{{ route('updatempa2020') }}">
  @csrf
  <input type="hidden" name="id" value="{{$s->id}}">
  <div class="form-group">
    <label for="client_id">Nama Client</label>
    <select name="client_id" id="client_id" class="form-control" onchange="updateFields()">
    <option value="" selected disabled>{{ $mpa2020[0]->nama_client }}</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}" data-nama_client="{{ $client->nama_client }}" data-alamat="{{ $client->alamat }}" data-up="{{ $client->up_invoice }}" 
                {{ $client->id == $mpa2020[0]->client_id ? 'selected' : '' }}>
                {{ $client->nama_client }}
            </option>
        @endforeach
    </select>
    <input type="hidden" class="form-control" name="nama_client" id="nama_client" value="{{ $mpa2020[0]->nama_client }}">
    <br>
    <label>Alamat Client</label>
    <input type="text" name="alamat_client" id="alamat_client" class="form-control"  value="{{ $mpa2020[0]->alamat_client }}" readonly>
    <br>
    <label>Kepada</label>
    <input type="text" name="up" id="up" class="form-control" value="{{ $mpa2020[0]->up }}" readonly>
</div>
<div class="form-group">
    <label>Item</label>
    <input type="text" name="item" class="form-control" value="{{$s->item}}" placeholder="" >
  </div>  
  <div class="row">
    <!-- Left Column -->
    <div class="col-md-6">
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" value="{{$s->deskripsi}}" placeholder="Masukkan Deskripsi" >
            <label>Qty</label>
            <input type="number" name="qty" class="form-control" value="{{$s->qty}}" placeholder="" >
            <label>Satuan</label>
            <input type="text" name="satuan" class="form-control" value="{{$s->satuan}}" placeholder="" >
            <label>Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{$s->harga}}" placeholder="" oninput="updateJumlah()">
            <label>Jumlah</label>
            <input type="text" name="jumlah" id="jumlah" value="{{$s->jumlah}}" class="form-control" readonly>
        </div>
    </div>

    <!-- Right Column -->
    <div class="col-md-6">
        <div class="form-group">
            <label>Deskripsi Lainnya</label>
            <input type="text" name="deskripsi_lainnya" value="{{$s->deskripsi_lainnya}}" class="form-control" placeholder="Masukkan Deskripsi Lainnya" >
            <label>Qty</label>
            <input type="number" name="qty_lainnya" value="{{$s->qty_lainnya}}" class="form-control" placeholder="" >
            <label>Satuan</label>
            <input type="text" name="satuan_lainnya" value="{{$s->satuan_lainnya}}" class="form-control" placeholder="" >
            <label>Harga</label>
            <input type="number" name="harga_lainnya" class="form-control" value="{{$s->harga_lainnya}}" placeholder="" oninput="updateJumlahLainnya()">
            <label>Jumlah</label>
            <input type="text" name="jumlah_lainnya" id="jumlah_lainnya" value="{{$s->jumlah_lainnya}}" class="form-control" readonly>
        </div>
    </div>
</div>
<div class="form-group">
    <label>Jumlah Total</label>
    <input type="text" name="jumlah_total" id="jumlahInput" value="{{$s->jumlah_total}}" class="form-control" oninput="calculatePPN()" readonly>
</div>
<div class="form-group">
    <label>PPN</label>
    <input type="text" name="ppn" id="ppnInput" value="{{$s->ppn}}" class="form-control" readonly>
</div>
  <div class="form-group">
    <label>Total Invoice</label>
    <input type="text" name="total_invoice" value="{{$s->total_invoice}}" class="form-control" >
  </div>
  <div class="form-group">
    <label>FP</label>
    <input type="text" name="fp" value="{{$s->fp}}" class="form-control"  >
  </div>
  <div class="form-group">
    <label>Status</label>
    <input type="text" name="status" value="{{$s->status}}" class="form-control"  >
  </div>
  <div class="form-group">
    <label>Tgl Paid</label>
    <input type="date" name="tgl_paid" value="{{$s->tgl_paid}}" class="form-control" >
  </div>
  <div class="form-group">
    <label>No.BAST</label>
    <input type="text" name="no_bast" value="{{$s->no_bast}}" class="form-control"  >
  </div>
  <div class="form-group">
    <label>Jenis</label>
    <select name="jenis" class="form-control" id="selectField">
        <option value="--Pilih Jenis--" {{ $s->jenis == '--Pilih Jenis--' ? 'selected' : '' }}>--Pilih Jenis--</option>
        <option value="-" {{ $s->jenis == '-' ? 'selected' : '' }}>-</option>
        <option value="FPB" {{ $s->jenis == 'FPB' ? 'selected' : '' }}>FPB</option>
        <option value="PO" {{ $s->jenis == 'PO' ? 'selected' : '' }}>PO</option>
        <option value="Kontrak" {{ $s->jenis == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
        <option value="SPPK" {{ $s->jenis == 'SPPK' ? 'selected' : '' }}>SPPK</option>
        <option value="SPK" {{ $s->jenis == 'SPK' ? 'selected' : '' }}>SPK</option>
    </select>
</div>
  <div class="form-group">
    <label>Due Date</label>
    <input type="date" name="due_date" value="{{$s->due_date}}" class="form-control"  >
  </div>
  <div class="form-group">
    <label for="bank_id">Nama Bank</label>
    <select name="bank_id" id="bank_id" class="form-control"  onchange="updateFieldsBank()">
    <option value="" selected disabled>{{ $mpa2020[0]->nama_bank }}</option>
        @foreach($banks as $bank)
            <option value="{{ $bank->id }}" data-nama_bank="{{ $bank->nama_bank }}" data-an="{{ $bank->an }}" data-ac="{{ $bank->ac }}" 
                {{ $bank->id == $mpa2020[0]->bank_id ? 'selected' : '' }}>
                {{ $bank->nama_bank }}
            </option>
        @endforeach
    </select>
    <input type="hidden" name="nama_bank" class="form-control" id="nama_bank" value="{{ $mpa2020[0]->nama_bank }}">
    <br>
    <label>A/N</label>
    <input type="text" name="an" id="an" class="form-control"  value="{{ $mpa2020[0]->an }}" readonly>
    <br>
    <label>A/C</label>
    <input type="text" name="ac" id="ac" class="form-control" value="{{ $mpa2020[0]->ac }}" readonly>
</div>
  <div class="form-group">
    <label>No.FP</label>
    <input type="text" value="{{$s->no_fp}}" name="no_fp" class="form-control"  >
  </div>

<div class="form-group text-right">
    <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Update</button>
    <a href= {{ url("mpa2020") }} class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
  </div>
  </form>

<script>
  function updateFields() {
        var select = document.getElementById('client_id');
        var selectedOption = select.options[select.selectedIndex];
        
        document.getElementById('nama_client').value = selectedOption.getAttribute('data-nama_client');
        document.getElementById('alamat_client').value = selectedOption.getAttribute('data-alamat');
        document.getElementById('up').value = selectedOption.getAttribute('data-up');
    }

    document.getElementById('bank_id').addEventListener('change', updateFieldsBank);

    function updateFieldsBank() {
        var selectedBank = document.getElementById('bank_id');
        var namaBankInput = document.getElementById('nama_bank');
        var anInput = document.getElementById('an');
        var acInput = document.getElementById('ac');

        var selectedOption = selectedBank.options[selectedBank.selectedIndex];
        namaBankInput.value = selectedOption.getAttribute('data-nama_bank');
        anInput.value = selectedOption.getAttribute('data-an');
        acInput.value = selectedOption.getAttribute('data-ac');
    }
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
@endforeach
@endsection