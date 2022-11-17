@extends('back.index')
@section('content')
<div class="content-body">
  <div class="container-fluid">
    <div class="row page-titles">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Master Data</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Reservasi</a></li>
      </ol>
    </div>
    <!-- row -->

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Data Reservasi</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-responsive-md">
                <thead>
                  <tr>
                    <th style="width:80px;"><strong>NO</strong></th>
                    <th><strong>Nama</strong></th>
                    <th><strong>Tanggal Reservasi</strong></th>
                    <th><strong>Check In</strong></th>
                    <th><strong>Jumlah Orang</strong></th>
                    <th><strong>Status</strong></th>
                    <th><strong>No Meja</strong></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($reservasi as $res)
                    <tr>
                      <td><strong>{{ $no++ }}</strong></td>
                      <td>{{ $res->users->fullname }}</td>
                      <td>{{ $res->tgl_reservasi }}</td>
                      <td>{{ $res->jam_in }}</td>
                      <td>{{ $res->jml_orang }}</td>
                      <td><span class="badge light badge-success">Successful</span></td>
                      <td>{{ $res->meja->no_meja }}</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                            <svg width="20px" height="20px" viewbox="0 0 24 24" version="1.1">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                              </g>
                            </svg>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Accept</a>
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
