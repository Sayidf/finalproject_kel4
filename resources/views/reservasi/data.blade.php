@extends('landingpage.index')
@section('content')
    <!--====== Reservation Section ======-->
    <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center mb-2">
                <div class="col-4">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                                fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg>
                            <span class="me-3"><strong>Sukses! </strong>{{ $message }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="btn-close"></button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="section-title">
                <h2>Reservation</h2>
                <p>Data Reservasi</p>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>

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


                                <tr>
                                    <td>{{ $data_reservasi->users->fullname }}</td>
                                    <td>{{ $data_reservasi->tgl_reservasi }}</td>
                                    <td>{{ $data_reservasi->jam_in }}</td>
                                    <td>{{ $data_reservasi->jml_orang }}</td>
                                    <td>
                                        @if ($data_reservasi->status == 'pending')
                                            <span class="badge light badge-warning">Pending</span>
                                        @elseif ($data_reservasi->status == 'approved')
                                            <span class="badge light badge-success">Successful</span>
                                        @else
                                            <span class="badge light badge-danger">Cancel</span>
                                        @endif
                                    </td>
                                    <td>{{ $data_reservasi->meja->no_meja }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ url('canceled', $data_reservasi->id) }}"
                                                class="btn btn-danger">Cancel</a>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== End Reservation Section ======-->
@endsection
