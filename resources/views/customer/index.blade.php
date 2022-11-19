@extends('back.index') 
@section('content') 
<div class="content-body">
  <div class="container-fluid">
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="#">Master Data</a></li>
				<li class="breadcrumb-item"><a href="#">Customer</a></li>
			</ol>
		</div>
    <!-- row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Data Customers</h4>
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
								<a class="dropdown-item" href="{{ url('/administrator/customer-pdf') }}">PDF</a>
								<a class="dropdown-item" href="{{ url('/administrator/customer-excel') }}">Excel</a>
							</div>
						</div>
					</div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example3" class="display" style="min-width: 845px">
                <thead>
                  <tr>
                    <th style="width: 30px;">No</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
									@php
										$no = 1;
									@endphp
									@foreach ($customer as $row)
									<tr>
										<td>{{$no++}}</td>
										<td>{{ $row->fullname }}</td>
										<td>{{ $row->username }}</td>
										<td>{{ $row->email }}</td>
										<td>{{ $row->no_hp }}</td>
										<td>
											<form method="POST" action="{{ route('customer.destroy',$row->id) }}">
												@csrf
												@method('DELETE')
													<button type="submit" class="btn btn-danger shadow btn-xs sharp" title="Hapus Customer" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i></button>											
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
  </div>
</div> 
@endsection