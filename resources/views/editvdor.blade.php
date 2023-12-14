@extends('layouts.panel')
@section('content')
<h3>Edit Vendor</h3>
@foreach($vdor as $s)
<form method="post" action= "{{ route('updatevdor') }}">
  @csrf
  <input type="hidden" name="id" value="{{$s->id}}">
  <div class="form-group">
    <label>Nama Vendor</label>
    <input type="text" name="nama_vendor" value="{{$s->nama_vendor}}" class="form-control" placeholder="PT. AGRA JAYA" required="">
  </div>
  <div class="form-group">
    <label>Alamat Vendor</label>
    <input type="text" name="alamat" value="{{$s->alamat}}" class="form-control" placeholder="Jl. KH. Hasyim Ashari Kav. DPR Blok A. No.213 Kel. Kenanga Kec. Cipondoh" required="">
  </div>
  <div class="form-group">
    <label>Kota</label>
    <input type="text" name="kota" value="{{$s->kota}}" class="form-control" placeholder="Tangerang" required="">
  </div>
  <div class="form-group">
    <label>Up</label>
    <input type="text" name="up" value="{{$s->up}}" class="form-control" placeholder="Tulus" required="">
  </div>
  <div class="form-group">
    <label>Telepon</label>
    <input type="text" name="telepon" value="{{$s->telepon}}" class="form-control" placeholder="08**********" required="">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" value="{{$s->email}}" class="form-control" placeholder="cindyprasasty@gmail.com" required="">
  </div>
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Update</button>
    <a href= {{ url("vdor") }} class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
  </div>
</form>
@endforeach
@include('sweetalert::alert')
@endsection