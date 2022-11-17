@extends('back.index')
@section('content')
@php
    //select option kategori
    $ar_kategori = App\Models\Kategori::all();
@endphp
<div class="content-body">
	<div class="container-fluid">
		<div class="row page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Master Data</a></li>
				<li class="breadcrumb-item"><a href="{{ url('administrator/menu') }}">Menu</a></li>
				<li class="breadcrumb-item active"><a href="#">Edit Menu <span class="">{{ $row->nama }}</span></a></li>
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
            <form method="POST" action="{{ route('menu.update',$row->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label class="form-label">Nama</label>
                <input name="nama" type="text" value="{{ $row->nama }}" class="form-control">
              </div> 

              <div class="mb-3">
                <label class="form-label"><b>Kategori</b></label>
                <div class="form-group">
                  <select class="form-control main" name="id_kategori">
                    <option selected>-- Pilih Kategori --</option>
                      @foreach($ar_kategori as $kat)
                        @php
                          $sel = ($kat->id == $row->id_kategori) ? 'selected' : '';
                        @endphp
                        <option value="{{ $kat->id }}" {{ $sel }}>{{ $kat->nama }}</option>
                      @endforeach
                  </select>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Harga</label>
                <input name="harga" type="text" value="{{ $row->harga }}" class="form-control" placeholder="Harga">
              </div>

              <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <input name="ket" type="text" value="{{ $row->ket }}" class="form-control" placeholder="Keterangan">
              </div>

              <div class="mb-3">
                <label class="form-label">Foto</label>
                <input name="foto" type="file" class="form-control form-file-input mb-2">
                @if(!empty($row->foto)) <img src="{{ url('/public/assets/img/menu')}}/{{$row->foto}}" width="10%" class="img-thumbnail" >
                  <br>{{ $row->foto }}
                @endif
              </div> 

              <div class="mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10 ">
                  <a class="btn btn-info" title="Kembali" href="{{ url('administrator/menu') }}">
                    <i class="bi bi-arrow-left-square"></i> Kembali
                  </a>
                  &nbsp;
                  <button type="submit" class="btn btn-warning" title="Simpan Menu"><i class="bi bi-save"></i> Ubah</button>
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