@extends('layouts.panel')
@section('content')
<h3>Edit Bank</h3>
@foreach($bank as $s)
<form method="post" action= "{{ route('updatebank') }}">
  @csrf
  <input type="hidden" name="id" value="{{$s->id}}">
  <div class="form-group">
    <label>Nama Bank</label>
    <input type="text" name="nama_bank" value="{{$s->nama_bank}}" class="form-control" placeholder="BNI Cabang Surabaya" required="">
  </div>
  <div class="form-group">
    <label>A/N</label>
    <input type="text" name="an" value="{{$s->an}}" class="form-control" placeholder="PT. Multi Power Abadi" required="">
  </div>
  <div class="form-group">
    <label>A/C</label>
    <input type="text" name="ac" value="{{$s->ac}}" class="form-control" placeholder="8112728253" required="">
  </div>
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Update</button>
    <a href= {{ url("bank") }} class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
  </div>
</form>
@endforeach
@endsection