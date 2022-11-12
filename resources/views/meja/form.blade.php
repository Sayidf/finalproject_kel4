@extends('back.index')
@section('content')
<div class="content-body">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-body">
					<h5 class="card-title">Form Meja</h5>
					@if ($errors->any())
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif	
					<form class="row g-3" method="POST" action="{{ route('meja.store') }}">
						@csrf
						<div class="col">
							<label for="inputNanme4" class="form-label">No Meja</label>
							<input type="text" class="form-control" name="no_meja">
							<label for="inputNanme4" class="form-label">Kapasitas</label>
							<input type="text" class="form-control" name="kapasitas">
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
@endsection

