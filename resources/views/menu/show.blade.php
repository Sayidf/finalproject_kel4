
    <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2> {{ $row->nama }}</h2>
          </div>
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('menu.index') }}" title="Go back"> <i
                      class="fas fa-backward "></i> </a>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Name:</strong>
              {{ $row->nama }}
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Kategori:</strong>
              {{ $row->kategori->nama }}
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Harga:</strong>
              {{ $row->harga }}
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Keterangan:</strong>
              {{ $row->ket }}
          </div>
      </div>
  </div>
