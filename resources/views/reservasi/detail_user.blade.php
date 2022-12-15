@extends('back.index')
@section('content')
<div class="content-body">
	<div class="container-fluid">
    <div class="row page-titles">
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="#">Master Data</a></li>
				<li class="breadcrumb-item"><a href="{{ url('administrator/menu') }}">Menu</a></li>
				{{-- <li class="breadcrumb-item active"><a href="#">Detail Menu <span class="">{{ $row->nama }}</span></a></li> --}}
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
              <a class="btn btn-primary btn-sm m-3" href="{{ url('administrator/menu') }}"><i class="fas fa-chevron-left"></i></a>
            </div>
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              {{-- @empty($row->foto)
              <img src="{{ url('/public/assets/img/menu/placeholder.jpg') }}" width="250" alt="Menu" class="rounded-circle">
              @else
              <img src="{{ url('/public/assets/img/menu')}}/{{$row->foto}}" width="250" alt="Menu" class="rounded-circle">
              @endempty --}}
              <div class="col text-center">
                <h2>{{ $row_order->menu->nama }}</h2>
                {{-- <span>{{ $row->kategori->nama }}</span> --}}
              </div>
              <div class="alert alert-primary w-50 d-flex justify-content-center mt-5" role="alert">
                <table class="table w-100">
                  <tr>
                    <td>Harga</td>
                    <td>:</td>
                    {{-- <td>{{ number_format($row->harga, 0, ',', '.') }}</td> --}}
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    {{-- <td>{{ $row->ket }}</td> --}}
                  </tr>
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