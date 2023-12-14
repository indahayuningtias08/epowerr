@extends('layouts.panel')
@section('content')
<h3>Tambah Client</h3>
<form method="post" action= "{{ route('simpanclient') }}">
  @csrf
  <div class="form-group">
    <label>Nama Client</label>
    <input type="text" name="nama_client" class="form-control" placeholder="Masukkan Nama Client" required="">
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Client" required="">
  </div>
  <div class="form-group">
    <label>Up Invoice</label>
    <input type="text" name="up_invoice" class="form-control" placeholder="Up Invoice" required="">
  </div>
  <div class="form-group">
    <label>Up SPH</label>
    <input type="text" name="up_sph" class="form-control" placeholder="Up SPH" required="">
  </div>
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Simpan</button>
    <a href="client" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
  </div>
</form>
@endsection

