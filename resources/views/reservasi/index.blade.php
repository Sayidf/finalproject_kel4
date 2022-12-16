@extends('back.index')
@section('content')
  <div class="content-body">
    <div class="container-fluid">
      <div class="row page-titles">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="javascript:void(0)">Master Data</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Reservasi</a></li>
        </ol>
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data Reservasi</h4>
              @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show">
                  <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                    fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                    <polyline points="9 11 12 14 22 4"></polyline>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                  </svg>
                  <span class="me-3"><strong>Sukses! </strong>{{ $message }}</span>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                </div>
              @endif
              <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-warning dropdown-toggle btn-sm me-2"
                  data-bs-toggle="dropdown" aria-expanded="false">Cetak</button>
                <div class="dropdown-menu" style="margin: 0px;">
                  <a class="dropdown-item" href="{{ url('/administrator/reservasi-pdf') }}">PDF</a>
                  <a class="dropdown-item" href="{{ url('/administrator/reservasi-excel') }}">Excel</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                  <thead>
                    <tr>
                      <th style="width: 30px;"><strong>NO</strong></th>
                      <th><strong>Nama</strong></th>
                      <th><strong>Tanggal Reservasi</strong></th>
                      <th><strong>Check In</strong></th>
                      <th><strong>Jumlah Orang</strong></th>
                      <th><strong>Status</strong></th>
                      <th><strong>No Meja</strong></th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                    @foreach ($reservasi as $res)
                      <tr>
                        <td><strong>{{ $no++ }}</strong></td>
                        <td>{{ $res->users->fullname }}</td>
                        <td>{{ $res->tgl_reservasi }}</td>
                        <td>{{ $res->jam_in }}</td>
                        <td>{{ $res->jml_orang }}</td>
                        <td>
                          @if ($res->status == 'pending')
                            <span class="badge light badge-warning">Pending</span>
                          @elseif ($res->status == 'approved')
                            <span class="badge light badge-success">Approved</span>
                          @elseif ($res->status == 'done')
                            <span class="badge light badge-success">Done</span>
                          @else
                            <span class="badge light badge-danger">Cancel</span>
                          @endif
                        </td>
                        <td>{{ $res->meja->no_meja }}</td>
                        <td>
                          <div class="d-flex">
                            <form method="POST" id="formDelete">
                              @csrf
                              @method('DELETE')
                              {{-- @if ($res->status == 'done')
                                <a class="btn btn-dark shadow btn-xs sharp me-1" title="Detail Menu" href=" {{ route('reservasi.show',$res->id) }}"><i class="fas fa-eye"></i></a>	
                              @endif --}}
															@if ($res->status == 'pending')
                              	<a class="btn btn-primary shadow btn-xs sharp me-1" href="{{ url('approved', $res->id) }}"><i class="fas fa-check"></i></a>
															@endif
                              {{-- <button type="submit" class="btn btn-danger shadow btn-xs sharp" title="Hapus Customer"><i class="fa fa-trash"></i></button> --}}
                              {{-- <button type="submit" data-action="{{ route('meja.destroy',$res->id) }}" class="dropdown-item btnDelete" title="Hapus Meja">Hapus</button> --}}
                            </form>
                          </div>
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
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script type="text/javascript">
    $('body').on('click', '.btnDelete', function(e) {
      e.preventDefault();
      var action = $(this).data('action');

      Swal.fire({
        title: 'Yakin ingin menghapus data ini?',
        text: "Data yang sudah dihapus tidak bisa dikembalikan lagi",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Yakin'
      }).then((result) => {
        if (result.isConfirmed) {
          $('#formDelete').attr('action', action);
          $('#formDelete').submit();
        }
      });
    });
  </script>
@endsection
