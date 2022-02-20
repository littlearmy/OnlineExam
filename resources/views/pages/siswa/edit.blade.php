@extends('layout.app')

@section('title', 'Edit Siswa | Ujian Online')

@section('content')
<!-- Header -->
<div class="header bg-warning pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Data Siswa</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Data Siswa</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Siswa</li>
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
          <h3 class="mb-0">Masukkan Data Siswa</h3>
        </div>
        <div class="card-body">
          <form action={{ route('siswa.update', $siswa->id) }} method="POST">
            @method('PUT')
            @csrf
            <h3>Data Akun Siswa</h3>
            <div class="form-group">
              <label class="form-control-label">Nama</label>
              <input type="text" class="form-control" name="name" value="{{ $siswa->user->name }}" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $siswa->user->email }}" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Password</label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Konfirmasi Password</label>
              <input type="password" class="form-control" name="konfirmasi_password" required>
            </div>
            <hr>
            <h3>Data Pribadi Siswa</h3>
            <div class="form-group">
                <label class="form-control-label">Kelas</label>
                <select class="form-control" data-toggle="select" name="id_kelas" required>
                    <option selected hidden>Pilih Kelas</option>
                    @foreach ($kelas as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $siswa->id_kelas ? 'selected' : '' }}>{{ $data->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
              <label class="form-control-label">Nomor Induk Siswa (NIS)</label>
              <input type="number" class="form-control" name="nis" value="{{ $siswa->nis }}" required>
            </div>
            <div class="form-group">
              <label class="form-control-label">Nomor Handphone</label>
              <input type="number" class="form-control" name="no_hp" value="{{ $siswa->no_hp }}" required>
            </div>
            <div class="form-group">
              <label class="form-control-label" for="exampleFormControlTextarea1">Alamat</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" style="height: 78px;">{{ $siswa->alamat }}</textarea>
            </div>
            <a href="/siswa" class="btn btn-md btn-warning">Kembali</a>
            <button type="submit" class="btn btn-md btn-success">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection