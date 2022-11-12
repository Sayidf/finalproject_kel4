@extends('landingpage.index')
@section('content')
<!-- ======= Book A Table Section ======= -->
<section id="login" class="login">
  <div class="container" data-aos="fade-up">
    <form action="#" method="post" role="form" data-aos="fade-up" data-aos-delay="100">
      <div class="d-flex justify-content-center">
        <div class="card bg-dark">
          <h4 class="text-center my-5">Log in</h4>
          <div class="row justify-content-center">
            <div class="col-md-10 form-group username-input">
              <input type="text" name="name" class="form-control with-icon" id="name" placeholder="Username" required>
              <div class="validate"></div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-10 form-group password-input mt-2">
              <input type="password" class="form-control with-icon" name="password" id="date" placeholder="Password" required>
              <div class="validate"></div>
            </div>
          </div>
          <div class="text-center">
            <button class="my-4" type="submit">Login</button>
            <p class="mb-5">Belum punya akun? <a href="{{'register'}}">Register</a></p>
          </div>  
        </div>
      </div>
    </form>
  </div>
</section><!-- End Book A Table Section -->
@endsection