@extends('layouts.panel')
@section('content')
<h3>Edit Client</h3>
@foreach($client as $s)
<form method="post" action= "{{ route('updateclient') }}">
  @csrf
  <input type="hidden" name="id" value="{{$s->id}}">
  <div class="form-group">
    <label>Nama Client</label>
    <input type="text" name="nama_client" value="{{$s->nama_client}}" class="form-control" placeholder="PT. TELKOMSEL AREA JAWA BALI " required="">
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" value="{{$s->alamat}}" class="form-control" placeholder="Gedung Telkom Landmark Tower ( TLT) Lantai 6,7,8 Jl. Manyar Kertoadi No. 1 RT.02 RW. 09 Kel. Klampis Ngasem, Kec. Sukolilo, Surabaya - 60116" required="">
  </div>
  <div class="form-group">
    <label>Up Invoice</label>
    <input type="text" name="up_invoice" value="{{$s->up_invoice}}" class="form-control" placeholder="Manager Treasury" required="">
  </div>
  <div class="form-group">
    <label>Up SPH</label>
    <input type="text" name="up_sph" value="{{$s->up_sph}}" class="form-control" placeholder="GM Procurement Area Jawa Bali" required="">
  </div>
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Update</button>
    <a href= {{ url("client") }} class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
  </div>
</form>
@endforeach
@endsection