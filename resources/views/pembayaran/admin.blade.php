@extends('back.index') 
@section('content') 
<div class="content-body">
  <div class="container-fluid">
    <div class="row page-titles">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">
          <a href="javascript:void(0)">Master Data</a>
        </li>
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">Pembayaran</a>
        </li>
      </ol>
    </div>
    <!-- row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Data Pembayaran</h4> 
						@if ($message = Session::get('success'))
							<div class="alert alert-success alert-dismissible fade show">
								<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
                <span class="me-3"><strong>Sukses! </strong>{{ $message }}</span>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
							</div>
						@endif
						<div>
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-outline-warning dropdown-toggle btn-sm me-2" data-bs-toggle="dropdown" aria-expanded="false">Cetak</button>
								<div class="dropdown-menu" style="margin: 0px;">
									<a class="dropdown-item" href="{{ url('/administrator/pembayaran-pdf') }}">PDF</a>
									<a class="dropdown-item" href="{{ url('/administrator/pembayaran-excel') }}">Excel</a>
								</div>
							</div>
						</div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example3" class="table table-responsive-md">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Booking</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Total Bayar</th>
                  </tr>
                </thead>
                <tbody> 
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($pembayaran as $row) 
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ 'TRX-'.sprintf('%07d',$row->reservasi->id) }}</td>
                      <td>{{ $row->reservasi->users->fullname }}</td>
                      <td>{{ $row->tgl_pembayaran }}</td>
                      <td>{{ $row->total_bayar }}</td>
                      <td></td> 
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