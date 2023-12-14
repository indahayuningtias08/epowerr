@extends('layouts.panel')
@section('content')
<h3>Edit Project ID</h3>
@foreach($projectid as $s)
<form method="post" action= "{{ route('updateprojectid') }}">
  @csrf
  <input type="hidden" name="id" value="{{$s->id}}">
  <div class="form-group">
    <label>Nama Project</label>
    <input type="text" name="nama_project" value="{{$s->nama_project}}" class="form-control" placeholder="Masukkan Nama Project" required="">
  </div>
  <div class="form-group">
    <label>HPP/Nilai Kontrak</label>
    <input type="text" name="hpp" value="{{$s->hpp}}" class="form-control" placeholder="" required="">
  </div>
  <div class="form-group">
    <label>RAB/Rancangan Anggaran Biaya</label>
    <input type="text" name="rab" value="{{$s->rab}}" class="form-control" placeholder="" required="">
  </div>
  <div class="form-group">
    <label>Nama Client</label>
    <input type="text" name="nama_client" value="{{$s->nama_client}}" class="form-control" placeholder="Masukkan Nama Client" required="">
  </div>
  <div class="form-group">
    <label>Alamat Client</label>
    <input type="text" name="alamat_client" value="{{$s->alamat_client}}" class="form-control" placeholder="Masukkan Alamat Client" required="">
  </div>
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Update</button>
    <a href= {{ url("projectid") }} class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
  </div>
</form>
@endforeach
@include('sweetalert::alert')
@endsection