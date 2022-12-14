@extends('back.index')
@section('content')
<div class="content-body">
	<div class="container-fluid">
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="#">Master Data</a></li>
				<li class="breadcrumb-item"><a href="#">Kategori Menu</a></li>
			</ol>
		</div>
		<!-- row -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Data Kategori Menu</h4>
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
									<a class="dropdown-item" href="{{ url('/administrator/kategori-pdf') }}">PDF</a>
									<a class="dropdown-item" href="{{ url('/administrator/kategori-excel') }}">Excel</a>
								</div>
							</div>
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kategoriModal">
								<i class="bi bi-plus-lg"></i> Tambah
							</button>
						</div>

						<!-- Modal -->
						<div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModalLabel" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-centered">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h4 class="modal-title" id="kategoriModalLabel">Tambah Kategori Menu</h4>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div>
									<form class="row g-3" method="POST" action="{{ route('kategori.store') }}">
										@csrf
						      	<div class="modal-body">
											<div class="row">
												<div class="mb-3">
													<label class="form-label">Nama Kategori</label>
													<input name="nama" type="text" class="form-control" placeholder="Nama Kategori">
												</div>
											</div>
						      	</div>
						      	<div class="modal-footer">
											<button type="submit" class="btn btn-primary">Submit</button>
											<button type="button" class="btn light btn-danger" data-bs-dismiss="modal">Close</button>
						      	</div>
									</form>
						    </div>
						  </div>
						</div>
						<!-- End Modal -->
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example3" class="display" style="min-width: 845px">
								<thead>
									<tr>
										<th style="width: 30px;">No</th>
										<th>Nama Kategori</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@php
										$no = 1;
									@endphp
									@foreach ($kategori as $row)
										<tr>
											<td>{{$no++}}</td>
											<td>{{ $row->nama }}</td>
											<td>
												<div class="d-flex">
													<form method="POST" id="formDelete">
														@csrf
														@method('DELETE')
															<a class="btn btn-primary shadow btn-xs sharp me-1" href="{{ route('kategori.edit',$row->id) }}"><i class="fas fa-pencil-alt"></i></a>
															<button type="submit" data-action="{{ route('kategori.destroy',$row->id) }}" class="btn btn-danger shadow btn-xs sharp btnDelete" title="Hapus Kategori"><i class="fa fa-trash"></i></button>
													</form>
												</div>
												{{-- <div class="dropdown">
													<button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
														<svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
													</button>
													<div class="dropdown-menu">
                            <form method="POST" action="{{ route('kategori.destroy',$row->id) }}">
                              @csrf
                              @method('DELETE')
                                <a class="dropdown-item" href="{{ url('kategori.edit',$row->id) }}">Edit</a>
														    <button type="submit" class="dropdown-item" title="Hapus Kategori" onclick="return confirm('yakin?')">Hapus</button>
													  </form>
													</div>
												</div> --}}
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