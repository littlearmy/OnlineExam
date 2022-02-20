@extends('layout.app')

@section('title', 'Tambah Jadwal | Ujian Online')

@section('content')
<!-- Header -->
<div class="header bg-warning pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Data Jadwal</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Data Jadwal</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Jadwal</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h3 class="mb-0">Masukkan Data Jadwal</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('jadwal.store') }}" method="POST">
            @csrf
            <h3>Data Jadwal</h3>
            <div class="form-group">
              <label class="form-control-label">Mapel Ujian</label>
              <select class="form-control" data-toggle="select" name="id_mapel" required>
                  <option selected hidden>Pilih Mapel</option>
                  @foreach ($mapel as $data)
                  <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
                  @endforeach
              </select>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="form-control-label">Tanggal</label>
                  <input type="date" class="form-control" name="tanggal" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="form-control-label">Jam Mulai</label>
                  <input type="time" class="form-control" name="jam_mulai" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="form-control-label">Jam Selesai</label>
                  <input type="time" class="form-control" name="jam_selesai" required>
                </div>
              </div>
            </div>
            <a href="/jadwal" class="btn btn-md btn-warning">Kembali</a>
            <button type="submit" class="btn btn-md btn-success">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection