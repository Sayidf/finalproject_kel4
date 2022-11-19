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
							<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
							<span class="me-3"><strong>Sukses! </strong>{{ $message }}</span>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
						</div>
						@endif
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-outline-warning dropdown-toggle btn-sm me-2" data-bs-toggle="dropdown" aria-expanded="false">Cetak</button>
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
                          @elseif ($res->status == 'success') 
                            <span class="badge light badge-success">Successful</span>
                          @else 
                            <span class="badge light badge-danger">Cancel</span>
                          @endif
                      </td>
                      <td>{{ $res->meja->no_meja }}</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                            <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                              </g>
                            </svg>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Accept</a>
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                          </div>
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
@endsection
