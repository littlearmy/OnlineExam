@extends('layout.app')

@section('title', 'Edit Guru | Ujian Online SMAN 2 Baubau')

@section('content')
<!-- Header -->
<div class="header bg-warning pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Data Guru</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Data Guru</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Guru</li>
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
          <h3 class="mb-0">Masukkan Data Guru</h3>
        </div>
        <div class="card-body">
          <form action={{ route('guru.update', $guru->id) }} method="POST">
            @method('PUT')
            @csrf
            <h3>Data Akun Guru</h3>
            <div class="form-group">
              <label class="form-control-label">Nama</label>
              <input type="text" class="form-control" name="name" value="{{ $guru->user->name }}" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $guru->user->email }}" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Password</label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <hr>
            <h3>Data Pribadi Guru</h3>
            <div class="form-group">
              <label class="form-control-label">Nomor Induk Pegawai (NIP)</label>
              <input type="number" class="form-control" name="nig" value="{{ $guru->nig }}" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Nomor Handphone</label>
              <input type="number" class="form-control" name="no_hp" value="{{ $guru->no_hp }}" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="exampleFormControlTextarea1">Alamat</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" style="height: 78px;">{{ $guru->alamat }}</textarea>
            </div>
            <a href="/guru" class="btn btn-md btn-warning">Kembali</a>
            <button type="submit" class="btn btn-md btn-success">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection