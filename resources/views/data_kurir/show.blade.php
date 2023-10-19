@extends('master.main')
@section('pagecontent')
<h1 class="text-center mb-5">Data Kurir</h1>
<a class="btn btn-primary mb-3" href="{{route('data_kurir.index')}}">
  Kembali
</a>
<div class="card mb-3">
  <div class="card-header">Data kurir</div>
  <div class="card-body">
    <table class="table table-success table-striped">
      <tr>
        <td>NIK</td><td>{{$data_kurir->nik_kurir}}</td>
      </tr>
      <tr>
        <td>Nama</td><td>{{$data_kurir->nama_kurir}}</td>
      </tr>
      <tr>
        <td>Alamat</td><td>{{$data_kurir->alamat_kurir}}</td>
      </tr>
      <tr>
        <td>Notel</td><td>{{$data_kurir->notel_kurir}}</td>
      </tr>
      <tr>
        <td>Tingkat</td><td>{{$data_kurir->tingkat_kurir}}</td>
      </tr>
    </table>
  </div>
</div>
@endsection