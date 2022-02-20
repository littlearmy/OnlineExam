@extends('layout.app')

@section('title', 'Edit Kelas | Ujian Online')

@section('content')
<!-- Header -->
<div class="header bg-warning pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Data Kelas</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Data Kelas</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Kelas</li>
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
          <h3 class="mb-0">Masukkan Data Kelas</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
            @method('PUT')
            @csrf
            <h3>Data Kelas</h3>
            <div class="form-group">
              <label class="form-control-label">Nama Kelas</label>
              <input type="text" class="form-control" name="nama_kelas" value="{{ $kelas->nama_kelas }}" required>
            </div>
            <div class="form-group">
                <label class="form-control-label">Guru Perwalian</label>
                <select class="form-control" data-toggle="select" name="id_guru" required>
                    @foreach ($guru as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $kelas->id_guru ? 'selected' : '' }}>{{ $data->user->name }}</option>
                    @endforeach
                </select>
            </div>
            <a href="/kelas" class="btn btn-md btn-warning">Kembali</a>
            <button type="submit" class="btn btn-md btn-success">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection