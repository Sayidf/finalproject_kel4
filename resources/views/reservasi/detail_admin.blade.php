@extends('back.index')
@section('content')
<div class="content-body">
	<div class="container-fluid">
    <div class="row page-titles">
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="#">Master Data</a></li>
				<li class="breadcrumb-item"><a href="{{ url('administrator/reservasi') }}">Reservasi</a></li>
				<li class="breadcrumb-item active"><a href="#">Detail Reservasi</a></li>
			</ol>
		</div>
    <div class="row">
      <div class="col-xl-12">
          <div class="card">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
            @endif
            <div>
              <a class="btn btn-primary btn-sm m-3" href="{{ url('administrator/reservasi') }}"><i class="fas fa-chevron-left"></i></a>
            </div>
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <div class="col text-center">
                <h2>Reservasi #{{ sprintf('%07d', $row->order->id) }}</h2>
              </div>
              <div class="alert alert-primary w-50 d-flex justify-content-center mt-5" role="alert">
                <table class="table w-100">
                  <tr>
                    <td>Total</td>
                    <td>:</td>
                    <td>{{ number_format($row->order->total, 0, ',', '.') }}</td>
                  </tr>
                  {{-- <tr>
                    <td>Menu</td>
                    <td>:</td>
                    <td>{{ $row->quantityOrder }}</td>
                  </tr> --}}
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection