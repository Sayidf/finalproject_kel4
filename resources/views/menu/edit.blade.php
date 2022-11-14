<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-left">
          <h2>Edit Menu</h2>
      </div>
      <div class="pull-right">
          <a class="btn btn-primary" href="{{ route('menu.index') }}" title="Go back"> <i
                  class="fas fa-backward "></i> </a>
      </div>
  </div>
</div>

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

<form class="row g-3" method="POST" action="{{ route('menu.update', $row->id) }}"></form>
  @csrf
  <div class="modal-body">
    <div class="row">
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input name="nama" type="text" class="form-control" placeholder="Nama" value="{{ $row->nama }}">
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
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="button" class="btn light btn-danger" data-bs-dismiss="modal">Close</button>
  </div>
</form>