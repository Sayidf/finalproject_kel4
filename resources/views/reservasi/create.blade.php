@extends('landingpage.index')
@section('content')
<!--====== Reservation Section ======-->
<section id="book-a-table" class="book-a-table">
  <div class="container" data-aos="fade-up">
    <div class="row justify-content-center mb-2">
      <div class="col-4">
        @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
              fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
              <polyline points="9 11 12 14 22 4"></polyline>
              <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
            </svg>
            <span class="me-3"><strong>Sukses! </strong>{{ $message }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
          </div>
        @endif
      </div>
    </div>
    <div class="section-title">
      <h2>Reservation</h2>
      <p>Book a Table</p>
    </div>
    <form action="{{ route('reservasi.store') }}" method="post" data-aos="fade-up" data-aos-delay="100">
      @csrf
      <div class="row">
        <div class="col-lg-4 col-md-6 form-group">
          <input type="date" name="tgl_reservasi" class="form-control" id=""
            placeholder="Pilih Tanggal Reservasi" data-rule="minlen:4"
            data-msg="Please enter at least 4 chars">
        </div>
        <script>
          var today = new Date().toISOString().split('T')[0];
          document.getElementsByName("tgl_reservasi")[0].setAttribute('min', today);
        </script>
        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
          <input type="time" class="form-control" name="jam_in" id="starttime" placeholder="Check In"
            data-rule="email" data-msg="Please enter a valid email" min="11:00" max="22:59" pattern="(09|1[0-5]):[0-5]\d">
        </div>
        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
          <input type="time" class="form-control" name="jam_out" id="phone" placeholder="Checkout"
            data-rule="minlen:4" data-msg="Please enter at least 4 chars" min="11:01" max="23:00" pattern="(09|1[0-5]):[0-5]\d">
        </div>
        <div class="col-lg-4 col-md-6 form-group mt-3">
          <input type="number" id="jml-org" class="form-control " name="jml_orang" placeholder="Number of People"
            data-rule="minlen:4" data-msg="Please enter at least 4 chars" onkeypress="return isNumberKey(event)">
          <script>
            $('#jml-org').on('paste input', function () {
              var number = $(this).val()
              if (isNaN(number)) {
                $(this).val('');
              } 
              if (number > 12) {
                alert("Maksimal 12 Orang");
                $(this).val('');
              }
            });
          </script>
        </div>
        <div class="col-lg-4 col-md-6 form-group mt-3">
          <select name="id_meja" id="id_meja" class="form-control">
            <option disabled selected>--- Choose Table Number ---</option>
            @foreach ($arr_meja as $meja)
              <option value="{{ $meja->id }}" class="{{ $meja->kapasitas }}org">Table No {{ $meja->no_meja }}, Capacity of {{ $meja->kapasitas }} People</option>
            @endforeach
            <script>
              $(document).ready(function() {
                $('#id_meja').attr('disabled',true);
                $("#jml-org").on("keyup", function() {
                  var a = 4;
                  var b = 6;
                  var c = 8;
                  var d = 10;
                  var e = 12;
                  Number($("#jml-org").val()) > Number(a) ? $(".4org").hide() : $(".4org").show();
                  Number($("#jml-org").val()) > Number(b) ? $(".6org").hide() : $(".6org").show();
                  Number($("#jml-org").val()) > Number(c) ? $(".8org").hide() : $(".8org").show();
                  Number($("#jml-org").val()) > Number(d) ? $(".10org").hide() : $(".10org").show();
                  Number($("#jml-org").val()) > Number(e) ? $(".12org").hide() : $(".12org").show();
                  $(this).val().length !=0 ? $('#id_meja').attr('disabled', false) : $('#id_meja').attr('disabled', true);
                });
              });
            </script>
          </select>
        </div>
        <div class="col-lg-4 col-md-6 form-group mt-3">
          <button type="submit" class="btn btn-rounded" style="background:#cda45e;">Book a Table</button>
          <input type="hidden" class="form-control" name="id_users" value="{{ Auth::user()->id }}">
        </div>
      </div>
      <div class="mb-3">
        <div class="error-message"></div>
        @if ($errors->any())
          <div class="alert alert-danger mt-3">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      </div>
    </form>
  </div>
</section>
<!--====== End Reservation Section ======-->
@endsection
