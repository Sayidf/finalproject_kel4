@extends('landingpage.index')
@section('content')
<!-- ======= Book A Table Section ======= -->
<section id="book-a-table" class="book-a-table">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Register</h2>
      <p>Register New Account</p>
    </div>
    <form action="" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 form-group mt-3">
          <input type="text" name="fullname" class="form-control"  placeholder="Nama Lengkap" required>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 form-group mt-3">
          <input type="text" name="no_hp" class="form-control"  placeholder="No Hp" required>
          
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 form-group mt-3">
          <input type="email" name="email" class="form-control"  placeholder="Email" required>
          
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 form-group mt-3">
          <input type="text" name="name" class="form-control"  placeholder="Username" required>
          
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 form-group mt-3">
          <input type="password" class="form-control calendar" name="password"  placeholder="password" required>
          
        </div>
      </div>

      <div class="text-center"><button type="submit">Register</button>
        <p class="mt-3">Sudah punya akun? <a href="{{'mylogin'}}">Login</a></p>
      </div>

    </form>
  </div>
</section><!-- End Book A Table Section -->
@endsection