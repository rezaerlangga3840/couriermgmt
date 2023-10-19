@extends('master.main')
@section('pagecontent')
<h1 class="text-center mb-5">Data Kurir</h1>
<a class="btn btn-primary mb-3" href="{{route('data_kurir.create')}}">
  Buat baru
</a>
<div class="row g-3 align-items-center mt-2 mb-2">
  <div class="row mb-3">
    <div class="col-sm-3">
      <form action="{{route('data_kurir.index')}}" method="GET">
        <label for="" class="form-label">Cari</label>
        <input name="search" type="text" class="form-control" placeholder="Cari nama kurir" value="{{ old('keyword', $keyword) }}">
      </form>
    </div>
    <div class="col-sm-3">
      <form action="{{route('data_kurir.index')}}" method="GET">
        <label for="" class="form-label">Tingkat</label>
        <input name="level" type="text" class="form-control" placeholder="Tingkat" value="{{ old('level', $level) }}">
      </form>
    </div>
  </div>
</div>
<form action="{{route('data_kurir.store')}}" method="POST">
  @csrf
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Kurir Baru</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
</form>
<div class="card">
  <div class="card-body">
    <table class="table">
      <thead>
        <th>NO</th>
        <th>@sortablelink('nik_kurir','NIK')</th>
        <th>@sortablelink('nama_kurir','NAMA')</th>
        <th>@sortablelink('alamat_kurir','ALAMAT')</th>
        <th>@sortablelink('notel_kurir','NOTEL')</th>
        <th>@sortablelink('tingkat_kurir','TINGKAT')</th>
        <th>@sortablelink('created_at','TGL DIBUAT')</th>
        <th>OPSI</th>
      </thead>
      <tbody>
        @foreach($data_kurir as $no=>$dk)
        <tr>
          <td>{{$no+1}}</td>
          <td>{{$dk->nik_kurir}}</td>
          <td>{{$dk->nama_kurir}}</td>
          <td>{{$dk->alamat_kurir}}</td>
          <td>{{$dk->notel_kurir}}</td>
          <td>{{$dk->tingkat_kurir}}</td>
          <td>{{$dk->created_at}}</td>
          <td>
            <a class="btn btn-primary btn-sm" href="{{route('data_kurir.show',$dk->id)}}">LIHAT</a>
            <a class="btn btn-success btn-sm" href="{{route('data_kurir.edit',$dk->id)}}">EDIT</a>
            <form method="POST" action="{{route('data_kurir.destroy',$dk->id)}}">
              @csrf
              @method('delete')
              <button class="btn btn-danger btn-sm">HAPUS</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {!! $data_kurir->appends(Request::except('page'))->render() !!}
  </div>
</div>
@endsection
