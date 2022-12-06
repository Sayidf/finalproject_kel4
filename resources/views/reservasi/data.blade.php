@extends('landingpage.index')
@section('content')
  <!--====== Reservation Section ======-->
  <section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center mb-2">
        <div class="col-4">
          @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                stroke-linecap="round" stroke-linejoin="round" class="me-2">
                <polyline points="9 11 12 14 22 4"></polyline>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
              </svg>
              <span class="me-3"><strong>Sukses! </strong>{{ $message }}</span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>
          @endif
        </div>
      </div>
      <div class="section-title">
        <h2>Reservation</h2>
        <p>Data Reservasi</p>
      </div>
      <div class="row d-flex justify-content-center">
				@if ( $data_reservasi->isEmpty() )
					Anda belum melakukan reservasi, silahkan reservasi terlebih dahulu
				@else
        <div class="card-body">
          <div class="table-responsive">
            <table id="example3" class="display w-100" style="min-width: 845px">
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
                @foreach ($data_reservasi as $res)
                  <tr>
                    <td>{{ $res->users->fullname }}</td>
                    <td>{{ $res->tgl_reservasi }}</td>
                    <td>{{ $res->jam_in }}</td>
                    <td>{{ $res->jml_orang }}</td>
                    <td>
                      @if ($res->status == 'pending')
                        <span class="badge light bg-warning rounded-pill">Pending</span>
                      @elseif ($res->status == 'approved')
                        <span class="badge light bg-success rounded-pill">Successful</span>
                      @elseif ($res->status == 'done')
                        <span class="badge light bg-success rounded-pill">Done</span>
                      @else
                        <span class="badge light bg-danger rounded-pill">Cancel</span>
                      @endif
                    </td>
                    <td>{{ $res->meja->no_meja }}</td>
                    <td>
                      <div class="d-flex justify-content-center">
                        @if ($res->status == 'pending')
                          <a href="{{ url('canceled', $res->id) }}" class="btn btn-danger text-tiny">Cancel</a>
                        @else
                        @endif
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
				@endif
      </div>
    </div>
  </section>
  <!--====== End Reservation Section ======-->
@endsection
