@extends('layout.app')

@section('title', 'Data Soal | Ujian Online')

@section('content')

  <!-- Header -->
  <div class="header bg-warning pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Data Soal</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                {{-- <li class="breadcrumb-item"><a href="#">Data Mata Pelajaran</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Data Soal</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('soal.create') }}" class="btn btn-md btn-neutral">Tambah Soal</a>
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
                  <th>Nama Mapel</th>
                  <th>Nama Soal</th>
                  <th>Jawaban Benar</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($soal as $data)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->mapel->nama_mapel}}</td>
                    <td>{!!$data->nama_soal!!}</td>
                    <td>{{$data->jawaban_benar}}</td>
                    <td class="text-center">
                      <a href="{{ route('soal.show', $data->id) }}" data-id="{{ $data->id }}" class="btn btn-sm btn-primary btn-show" title="Lihat Soal">
                          <i class="fas fa-eye"></i>
                      </a>
                      <a href="{{ route('soal.edit', $data->id) }}" data-id="{{ $data->id }}" class="btn btn-sm btn-warning btn-edit">
                          <i class="fas fa-edit"></i>
                      </a>
                      {{-- <a href="{{ route('dosen.destroy', $data->id) }}" data-id="{{ $data->id }}" class="btn btn-sm btn-danger swal-confirm">
                          <i class="fas fa-edit"></i>
                      </a> --}}
                      {{-- <a href="#" data-id="{{ $data->id }}" class="swal-confirm">
                          <form action="{{ route('dosen.destroy', $data->id)}}" method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <a href="#" class="btn btn-sm btn-danger">
                                  <i class="fas fa-trash"></i>
                              </a>
                          </form>
                      </a> --}}
                      <form action="{{ route('soal.destroy', $data->id) }}" method="POST" class="d-inline swal-confirm">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger swal-confirm" type="submit" data-id="{{ $data->id }}">
                              <i class="fas fa-trash swal-confirm"></i>
                          </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('addon-script')
<script>
  $(document).ready(function () {
      $('.swal-confirm').click(function(event) {
          var form =  $(this).closest("form");
          var id = $(this).data("id");
          event.preventDefault();
          swal({
              title: `Yakin Hapus Data?`,
              text: "Data yang terhapus tidak dapat dikembalikan",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, hapus',
          })
          .then((willDelete) => {
              if (willDelete) {
              form.submit();
              }
          });
      });
  });
</script>
@endpush