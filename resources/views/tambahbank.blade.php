@extends('layouts.panel')
@section('content')
<h3>Tambah Bank</h3>
<form method="post" action= "{{ route('simpanbank') }}">
  @csrf
  <div class="form-group">
    <label>Nama Bank</label>
    <input type="text" name="nama_bank" class="form-control" placeholder="Masukkan Nama Bank" required="">
  </div>
  <div class="form-group">
    <label>A/N</label>
    <input type="text" name="an" class="form-control" placeholder="Masukkan A/N" required="">
  </div>
  <div class="form-group">
    <label>A/C</label>
    <input type="text" name="ac" class="form-control" placeholder="Masukkan A/C" required="">
  </div>
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Simpan</button>
    <a href="bank" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
  </div>
</form>
@endsection

