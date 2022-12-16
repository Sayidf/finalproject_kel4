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
        <p>Reservation Data</p>
      </div>
      <div class="row d-flex justify-content-center">
				@if ( $data_reservasi->isEmpty() )
					Please make a reservation first to show history
				@else
        <div class="card-body">
          <div class="table-responsive container table-reservation">
            <table id="example3" class="table display w-100 text-white text-center border-temp-primary align-middle" cellspacing="0">
              <thead>
                <tr>
                  <th><strong>Booking ID</strong></th>
                  <th><strong>Name</strong></th>
                  <th><strong>Reservation Date</strong></th>
                  <th><strong>Check In</strong></th>
                  <th><strong>Number of People</strong></th>
                  <th><strong>Status</strong></th>
                  <th><strong>Table Number</strong></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_reservasi as $res)
                  <tr>
                    <td>{{ sprintf('%07d', $res->id) }}</td>
                    <td>{{ $res->users->fullname }}</td>
                    <td>{{ $res->tgl_reservasi }}</td>
                    <td>{{ $res->jam_in }}</td>
                    <td>{{ $res->jml_orang }}</td>
                    <td>
                      @if ($res->status == 'pending')
                        <span class="badge light bg-warning rounded-pill">Pending</span>
                      @elseif ($res->status == 'approved')
                        <span class="badge light bg-success rounded-pill">Approved</span>
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
                        @elseif ($res->status == 'approved')
                          <a href="{{ url('/menu') }}" class="btn btn-warning text-white text-tiny">Order</a>
                        {{-- @elseif ($res->status == 'done') --}}
                          {{-- <a href="{{ url('/detail-reservasi'.'/'.$res->id) }}" class="btn btn-info text-white text-tiny">Detail</a> --}}
                          {{-- <a href="{{ route('reservasi.show',$res->id) }}" class="btn btn-info text-white text-tiny">Detail</a>
                        @endif --}}
                        @endif
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        {{-- Tampilan Mobile --}}
        <div class="accordion d-none" id="accordion-reservasi">
          @foreach ($data_reservasi as $res)
            <div class="accordion-item">
              <h2 class="accordion-header" id="accordion-resv-heading{{ $res->id }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-resv-collapse{{ $res->id }}" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                  <table>
                    <tr>
                      <td width="100px">{{ date("d-m-Y", strtotime($res->tgl_reservasi)) }}</td>
                      <td><span class="text-white-50">({{ $res->jml_orang }} People)</span></td>
                    </tr>
                  </table>
                </button>
              </h2>
              <div id="accordion-resv-collapse{{ $res->id }}" class="accordion-collapse collapse" aria-labelledby="accordion-resv-heading{{ $res->id }}">
                <div class="accordion-body">
                  <table class="table text-white">
                    <tr>
                      <td>ID Booking</td>
                      <td>{{ sprintf('%07d', $res->id) }}</td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td>{{ $res->users->fullname }}</td>
                    </tr>
                    <tr>
                      <td>Tanggal Reservasi</td>
                      <td>{{ date("d-m-Y", strtotime($res->tgl_reservasi)) }}</td>
                    </tr>
                    <tr>
                      <td>Check In</td>
                      <td>{{ $res->jam_in }}</td>
                    </tr>
                    <tr>
                      <td>Jumlah Orang</td>
                      <td>{{ $res->jml_orang }}</td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td>                      
                        @if ($res->status == 'pending')
                          <span class="badge light bg-warning rounded-pill">Pending</span>
                        @elseif ($res->status == 'approved')
                          <span class="badge light bg-success rounded-pill">Approved</span>
                        @elseif ($res->status == 'done')
                          <span class="badge light bg-success rounded-pill">Done</span>
                        @else
                          <span class="badge light bg-danger rounded-pill">Cancel</span>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>No Meja</td>
                      <td>{{ $res->meja->no_meja }}</td>
                    </tr>
                    @if ($res->status == 'pending')
                      <tr>
                        <td class="align-middle">Aksi</td>
                        <td><a href="{{ url('canceled', $res->id) }}" class="btn btn-danger text-tiny">Cancel</a></td>
                      </tr>
                    @elseif ($res->status == 'approved')
                      <tr>
                        <td class="align-middle">Aksi</td>
                        <td><a href="{{ url('/menu') }}" class="btn btn-warning text-white text-tiny">Order</a></td>
                      </tr>
                    @endif
                  </table>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        @endif
      </div>
    </div>
  </section>
  <!--====== End Reservation Section ======-->
@endsection
