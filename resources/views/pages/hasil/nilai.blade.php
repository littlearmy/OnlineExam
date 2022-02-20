@extends('layout.app')

@section('title', 'Daftar Nilai | Ujian Online')

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
                {{-- <li class="breadcrumb-item"><a href="#">Tables</a></li> --}}
                <li class="breadcrumb-item" aria-current="page">Data Daftar Nilai</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <!-- Table -->
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h3 class="mb-0">Data Jenjang</h3>
          </div>
          <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-basic">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Nilai Final</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($hasil as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->siswa->user->name }}</td>
                    <td>{{ $data->nilai_final }}</td>
                    @if ($data->nilai_final >= 70)
                    <td class="text-success">Lulus</td>
                    @else
                    <td class="text-danger">Mengulang</td>
                    @endif
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <a href="/nilai-siswa" class="btn btn-warning">Kembali</a>
      </div>
    </div>
  </div>
@endsection
