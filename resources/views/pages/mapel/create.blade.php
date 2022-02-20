@extends('layout.app')

@section('title', 'Tambah Mata Pelajaran | Ujian Online')

@section('content')
<!-- Header -->
<div class="header bg-warning pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Data Mata Pelajaran</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Data Mata Pelajaran</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Mata Pelajaran</li>
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
          <h3 class="mb-0">Masukkan Data Mata Pelajaran</h3>
        </div>
        <div class="card-body">
          <form action={{ route('matapelajaran.store') }} method="POST">
            @csrf
            <div class="form-group">
              <label class="form-control-label">Nama Mata Pelajaran</label>
              <input type="text" class="form-control" name="nama_mapel" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Kelas (Tingkat)</label>
                <select class="form-control" data-toggle="select" name="kelas" required>
                    <option selected hidden>Pilih Kelas (Tingkat)</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>              
            </div>
            <div class="form-group">
              <label class="form-control-label">Status</label>
              <div class="custom-control custom-radio mb-3">
                <input name="status" class="custom-control-input" id="customRadio5" type="radio" value="1">
                <label class="custom-control-label" for="customRadio5">Aktif</label>
              </div>
              <div class="custom-control custom-radio mb-3">
                <input name="status" class="custom-control-input" id="customRadio1" type="radio" value="0">
                <label class="custom-control-label" for="customRadio1">Nonaktif</label>
              </div>
            </div>
            <a href="/matapelajaran" class="btn btn-md btn-warning">Kembali</a>
            <button type="submit" class="btn btn-md btn-success">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection