@extends('layouts.panel')
@section('content')
<h3>Tambah Project ID</h3>
<form method="post" action= "{{ route('simpanprojectid') }}">
  @csrf
  <div class="form-group">
    <label>Project ID</label>
    <input type="text" name="project_id" class="form-control" placeholder="Masukkan Project ID, EX: FNB-0000001" required="">
  </div>
  <div class="form-group">
    <label>Nama Project</label>
    <input type="text" name="nama_project" class="form-control" placeholder="Masukkan Nama Project" required="">
  </div>
  <div class="form-group">
    <label>HPP/Nilai Kontrak</label>
    <input type="text" name="hpp" class="form-control" placeholder="" required="">
  </div>
  <div class="form-group">
    <label>RAB/Rancangan Anggaran Biaya</label>
    <input type="text" name="rab" class="form-control" placeholder="" required="">
  </div>
  <div class="form-group">
    <label>Nama Client</label>
    <input type="text" name="nama_client" class="form-control" placeholder="Masukkan Nama Client" required="">
  </div>
  <div class="form-group">
    <label>Alamat Client</label>
    <textarea name="alamat_client" rows="3" class="form-control" placeholder="Masukkan Alamat Client" required=""></textarea>
  </div>
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Simpan</button>
    <a href="projectid" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
  </div>
</form>
@endsection

