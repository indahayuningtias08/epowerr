@extends('layouts.panel')
@section('content')
<h3>Tambah Vendor</h3>
<form method="post" action= "{{ route('simpanvdor') }}">
  @csrf
  <div class="form-group">
    <label>Nama Vendor</label>
    <input type="text" name="nama_vendor" class="form-control" placeholder="Masukkan Nama Vendor" required="">
  </div>
  <div class="form-group">
    <label>Alamat Vendor</label>
    <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Vendor" required="">
  </div>
  <div class="form-group">
    <label>Kota</label>
    <input type="text" name="kota" class="form-control" placeholder="Masukkan Kota" required="">
  </div>
  <div class="form-group">
    <label>Up</label>
    <input type="text" name="up" class="form-control" placeholder="Masukkan Up" required="">
  </div>
  <div class="form-group">
    <label>Telepon</label>
    <input type="text" name="telepon" class="form-control" placeholder="Masukkan No. Telepon" required="">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control" placeholder="Masukkan Email" required="">
  </div>
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Simpan</button>
    <a href="vdor" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
  </div>
</form>
@endsection

