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
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                        stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        class="me-2">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                    <span class="me-3"><strong>Sukses! </strong>{{ $message }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="btn-close"></button>
                                </div>
                            @endif
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal"
                                data-bs-target="#menuModal">
                                <i class="bi bi-plus-lg"></i> Tambah
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="menuModalLabel">Tambah Menu</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form class="row g-3" method="POST" action="{{ route('menu.store') }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama</label>
                                                        <input name="nama" type="text" class="form-control"
                                                            placeholder="Nama">
                                                    </div>

                                                    <<<<<<< HEAD <div class="mb-3">
                                                        <label class="form-label"><b>Kategori</b></label>
                                                        <div class="form-group">
                                                            <select class="form-control main" name="id_kategori">
                                                                <option selected>-- Pilih Kategori --</option>
                                                                @foreach ($kategori as $kat)
                                                                    <option value="{{ $kat->id }}">{{ $kat->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Harga</label>
                                                    <input name="harga" type="text" class="form-control"
                                                        placeholder="Harga">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Keterangan</label>
                                                    <input name="ket" type="text" class="form-control"
                                                        placeholder="Keterangan">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn light btn-danger"
                                            data-bs-dismiss="modal">Close</button>
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
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
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
                                            <td>{{ $no++ }}</td>
                                            <td><img class="rounded-circle" width="50"
                                                    src="https://dummyimage.com/256x256/bdbdbd/fff" alt=""></td>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->kategori->nama }}</td>
                                            <td>{{ $row->harga }}</td>
                                            <td>{{ $row->ket }}</td>
                                            <td>
                                                {{-- <form action="{{ route('menu.destroy', $row->id) }}" method="POST">
=======
												<div class="mb-3">
													<label class="form-label"><b>Kategori</b></label>
													<div class="form-group">
														<select class="form-control main" name="id_kategori">
															<option selected>-- Pilih Kategori --</option>
																@foreach ($kategori as $kat)
																	<option value="{{ $kat->id }}">{{ $kat->nama }}</option>
																@endforeach
														</select>
													</div>
												</div>
										
												<div class="mb-3">
													<label class="form-label">Harga</label>
													<input name="harga" type="text" class="form-control" placeholder="Harga">
												</div>
												<div class="mb-3">
													<label class="form-label">Keterangan</label>
													<input name="ket" type="text" class="form-control" placeholder="Keterangan">
												</div>
												<div class="mb-3">
													<label class="form-label">Foto</label>
													<input name="foto" type="file" class="form-control">
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
										<th>Foto</th>
										<th>Nama</th>
										<th>Kategori</th>
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
											<td>
												@empty($row->foto)
												<img src="{{ url('/public/admin/images/avatar/nophoto.jpg') }}" width="50" alt="Menu" class="rounded-circle" />
												@else
												<img src="{{ url('/public/admin/images/menu') }}/{{ $row->foto }}" width="50" alt="Menu" class="rounded-circle" />
												@endempty
										</td>
											<td>{{ $row->nama }}</td>
											<td>{{ $row->kategori->nama }}</td>
											<td>{{ $row->harga }}</td>
											<td>{{ $row->ket }}</td>
											<td>
                        {{-- <form action="{{ route('menu.destroy', $row->id) }}" method="POST">
>>>>>>> 57c3144edcd5a036daf965963c6698a0c48604cf

													<a data-toggle="modal" id="smallButton" data-target="#smallModal"
															data-attr="{{ route('menu.show', $row->id) }}" title="show">
															<i class="fas fa-eye text-success  fa-lg"></i>
													</a>

													<a class="text-secondary" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
															data-attr="{{ route('menu.edit', $row->id) }}">
															<i class="fas fa-edit text-gray-300"></i>
													</a>
													@csrf
													@method('DELETE')

													<button type="submit" title="delete" style="border: none; background-color:transparent;">
															<i class="fas fa-trash fa-lg text-danger"></i>
													</button>
											</form> --}}
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary light sharp"
                                                        data-bs-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewbox="0 0 24 24"
                                                            version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12"
                                                                    rS="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12"
                                                                    r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12"
                                                                    r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <!-- Button trigger Detail modal -->
                                                        <form method="POST"
                                                            action="{{ route('menu.destroy', $row->id) }}">
                                                            <button type="button"
                                                                data-path="{{ route('menu.show', $row->id) }}"
                                                                class="dropdown-item load-ajax-modal"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#menuDetailModal">Detail</button>
                                                            <a class="dropdown-item"
                                                                href="{{ url('administrator/menu-edit', $row->id) }}">Edit</a>

                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"
                                                                title="Hapus Pegawai"
                                                                onclick="return confirm('yakin?')">Hapus</button>
                                                        </form>
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


    <a class="dropdown-item" href="#">Edit</a>
    <button type="submit" class="dropdown-item" title="Hapus Pegawai" onclick="return confirm('yakin?')">Hapus</button>
    </form>
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

    {{-- Modal Detail Menu --}}

    <div class="modal fade detailmodal" id="detailmodal" tabindex="-1" aria-labelledby="detailmodalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detailModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary w-100 d-flex justify-content-center mt-3" role="alert">
                        <table class="table w-100">
                            <tr>
                                <td>Harga</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                        </table>

                        <br />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $('.btndetail').click(function(e) {
            $("#detailmodal").modal('show');
        })
    </script>
    {{-- <div class="modal fade" id="menuDetailModaldetail" tabindex="-1" aria-labelledby="menuDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="menuDetailModalLabel">Detail Menu</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img class="rounded-circle mb-3" width="256" src="https://dummyimage.com/256x256/bdbdbd/fff"
                            alt="">
                        <div class="col text-center">
                            <h2>{{ $row->nama }}</h2>
                            <span>{{ $row->kategori->nama }}</span>
                        </div>

                        <div class="alert alert-primary w-100 d-flex justify-content-center mt-3" role="alert">
                            <table class="table w-100">
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>{{ $row->harga }}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>{{ $row->ket }}</td>
                                </tr>
                            </table>

                            <br />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn light btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- End Modal Detail Menu --}}




    {{-- <script>
	// display a modal (small modal)
	$(document).on('click', '#smallButton', function(event) {
			event.preventDefault();
			let href = $(this).attr('data-attr');
			$.ajax({
					url: href,
					beforeSend: function() {
							$('#loader').show();
					},
					// return the result
					success: function(result) {
							$('#smallModal').modal("show");
							$('#smallBody').html(result).show();
					},
					complete: function() {
							$('#loader').hide();
					},
					error: function(jqXHR, testStatus, error) {
							console.log(error);
							alert("Page " + href + " cannot open. Error:" + error);
							$('#loader').hide();
					},
					timeout: 8000
			})
	});

	// display a modal (medium modal)
	$(document).on('click', '#mediumButton', function(event) {
			event.preventDefault();
			let href = $(this).attr('data-attr');
			$.ajax({
					url: href,
					beforeSend: function() {
							$('#loader').show();
					},
					// return the result
					success: function(result) {
							$('#mediumModal').modal("show");
							$('#mediumBody').html(result).show();
					},
					complete: function() {
							$('#loader').hide();
					},
					error: function(jqXHR, testStatus, error) {
							console.log(error);
							alert("Page " + href + " cannot open. Error:" + error);
							$('#loader').hide();
					},
					timeout: 8000
			})
	});

</script> --}}
@endsection
