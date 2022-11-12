@extends('back.index')
@section('content')
<div class="content-body">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">	
				<div class="card">
          <div class="card-header">
            <h4 class="card-title">Input Menu</h4> 
						@if ($errors->any()) 
							<div class="alert alert-danger">
            	  <strong>Whoops!</strong> There were some problems with your input. <br>
            	  <br>
            	  <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
            	</div> 
						@endif
          </div>
          <div class="card-body">
            <div class="basic-form">
              <form class="row g-3" method="POST" action="{{ route('menu.store') }}">
								@csrf
                <div class="row">
                  <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input name="nama" type="text" class="form-control" placeholder="Nama">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input name="harga" type="text" class="form-control" placeholder="Harga">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input name="ket" type="text" class="form-control" placeholder="Keterangan">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Batal</button>
                </div>
              </form>
            </div>
          </div>
      </div>
			</div>
		</div>
	</div>
</div>
@endsection

