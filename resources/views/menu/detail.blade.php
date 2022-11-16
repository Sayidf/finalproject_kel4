@extends('back.index')
@section('content')
<div class="content-body">
	<div class="container-fluid">
    <div class="row">
      <div class="col-xl-12">
          <div class="card">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              @empty($row->foto)
              <img src="{{ url('/public/admin/images/avatar/nophoto.jpg') }}" alt="Menu" class="rounded-circle">
              @else
              <img src="{{ url('/public/admin/images/menu')}}/{{$row->foto}}" alt="Menu" class="rounded-circle">
              @endempty
              <div class="col text-center">
                <h2>{{ $row->nama }}</h2>
                <span>{{ $row->kategori->nama }}</span>
              </div>
              <div class="alert alert-primary w-50 d-flex justify-content-center mt-5" role="alert">
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection