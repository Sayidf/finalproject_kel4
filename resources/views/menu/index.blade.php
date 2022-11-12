@extends('back.index')
@section('content')
<div class="content-body">
	<div class="container-fluid">
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="#">Master Data</a></li>
				<li class="breadcrumb-item"><a href="#">Menu</a></li>
			</ol>
		</div>
		<!-- row -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Data Menu</h4>
						@if ($message = Session::get('success'))
						<div class="alert alert-success">
								<p>{{ $message }}</p>
						</div>
						@endif
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#menuModal">
						  <i class="bi bi-plus-lg"></i> Tambah
						</button>

						<!-- Modal -->
						<div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-centered">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h4 class="modal-title" id="menuModalLabel">Tambah Menu</h4>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div>
									<form class="row g-3" method="POST" action="{{ route('menu.store') }}">
										@csrf
						      	<div class="modal-body">
											<div class="row">
												<div class="mb-3">
													<label class="form-label">Nama</label>
													<input name="nama" type="text" class="form-control" placeholder="Nama">
												</div>
												<div class="mb-3">
													<label class="form-label">Harga</label>
													<input name="harga" type="text" class="form-control" placeholder="Harga">
												</div>
												<div class="mb-3">
													<label class="form-label">Keterangan</label>
													<input name="ket" type="text" class="form-control" placeholder="Keterangan">
												</div>
											</div>
						      	</div>
						      	<div class="modal-footer">
											<button type="submit" class="btn btn-primary">Submit</button>
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						      	</div>
									</form>
						    </div>
						  </div>
						</div>
					</div>

					<div class="card-body">
						<div class="table-responsive">
							<table id="example3" class="display" style="min-width: 845px">
								<thead>
									<tr>
										<th style="width: 30px;">No</th>
										<th>Foto</th>
										<th>Nama</th>
										<th>Harga</th>
										<th>Keterangan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@php
										$no = 1;
									@endphp
									@foreach ($menu as $row)
										<tr>
											<td>{{$no++}}</td>
											<td><img class="rounded-circle" width="50" src="https://imgs.search.brave.com/ayCGV163wL7_8zo5dqDeFENLzkavod8-nyZy5bAqh5A/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9pMi53/cC5jb20vY2hpbGlw/ZXBwZXJtYWRuZXNz/LmNvbS93cC1jb250/ZW50L3VwbG9hZHMv/MjAyMC8xMS9OYXNp/LUdvcmVuZy1JbmRv/bmVzaWFuLUZyaWVk/LVJpY2UtU1EuanBn" alt=""></td>
											<td>{{ $row->nama }}</td>
											<td>{{ $row->harga }}</td>
											<td>{{ $row->ket }}</td>
											<td>
												<div class="dropdown">
													<button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
														<svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
													</button>
													<div class="dropdown-menu">
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