@extends('back.index')
@section('content')
<div class="content-body">
	<div class="container-fluid">
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Master Data</a></li>
				<li class="breadcrumb-item"><a href="{{ url('administrator/kategori') }}">Kategori Menu</a></li>
				<li class="breadcrumb-item active"><a href="#">Edit Kategori <span class="">{{ $row->nama }}</span></a></li>
			</ol>
		</div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form method="POST" action="{{ route('kategori.update',$row->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input name="nama" type="text" value="{{ $row->nama }}" class="form-control">
              </div> 

              <div class="mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10 ">
                  <a class="btn btn-info" title="Kembali" href=" {{ url('administrator/kategori') }}">
                    <i class="bi bi-arrow-left-square"></i> Kembali
                  </a>
                  &nbsp;
                  <button type="submit" class="btn btn-warning" title="Simpan Data Kategori Menu"><i class="bi bi-save"></i> Ubah</button>
                </div>
              </div>
            </form><!-- End General Form Elements -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection