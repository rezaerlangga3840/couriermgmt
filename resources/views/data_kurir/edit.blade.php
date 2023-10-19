@extends('master.main')
@section('pagecontent')
<h1 class="text-center mb-5">Edit Kurir</h1>
<a class="btn btn-primary mb-3" href="{{route('data_kurir.index')}}">
  Kembali
</a>
<form action="{{route('data_kurir.update',$data_kurir->id)}}" method="POST">
  @csrf
  @method('patch')
  <div class="card mb-3">
    <div class="card-header">Edit Kurir</div>
    <div class="card-body">
      <div class="forn-group mb-3">
        <label class="form-label" for="nik_kurir">NIK</label>
        <input type="text" class="form-control" value="{{ $data_kurir->nik_kurir }}" placeholder="NIK" aria-label="NIK" name="nik_kurir" pattern="[0-9]*" aria-describedby="nik_kurir">
      </div>
      <div class="forn-group mb-3">
        <label class="form-label" for="nama_kurir">Nama</label>
        <input type="text" class="form-control" value="{{ $data_kurir->nama_kurir }}" placeholder="Nama" aria-label="Nama" name="nama_kurir" aria-describedby="nama_kurir">
      </div>
      <div class="forn-group mb-3">
        <label class="form-label" for="alamat_kurir">Alamat</label>
        <input type="text" class="form-control" value="{{ $data_kurir->alamat_kurir }}" placeholder="Alamat" aria-label="Alamat" name="alamat_kurir" aria-describedby="alamat_kurir">
      </div>
      <div class="forn-group mb-3">
        <label class="form-label" for="notel_kurir">Notel</label>
        <input type="text" class="form-control" value="{{ $data_kurir->notel_kurir }}" placeholder="Notel" pattern="[0-9\+]*" aria-label="Notel" name="notel_kurir" aria-describedby="notel_kurir">
      </div>
      <div class="forn-group mb-3">
        <label class="form-label" for="tingkat_kurir">Tingkat</label>
        <select class="form-select" id="tingkat_kurir" name="tingkat_kurir">
          <option value="1" {{ ($data_kurir->tingkat_kurir == "1" ? "selected='selected'" : "") }}>1</option>
          <option value="2" {{ ($data_kurir->tingkat_kurir == "2" ? "selected='selected'" : "") }}>2</option>
          <option value="3" {{ ($data_kurir->tingkat_kurir == "3" ? "selected='selected'" : "") }}>3</option>
          <option value="4" {{ ($data_kurir->tingkat_kurir == "4" ? "selected='selected'" : "") }}>4</option>
          <option value="5" {{ ($data_kurir->tingkat_kurir == "5" ? "selected='selected'" : "") }}>5</option>
        </select>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Perbarui</button>
    </div>
  </div>
</form>
@endsection
