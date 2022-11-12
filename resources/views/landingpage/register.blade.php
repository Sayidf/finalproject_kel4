@extends('landingpage.index')
@section('content')
<section id="login" class="login">
  <div class="container" data-aos="fade-up">
    <form action="#" method="post" role="form" data-aos="fade-up" data-aos-delay="100">
      <div class="d-flex justify-content-center">
        <div class="card bg-dark">
          <h4 class="text-center my-5">Register</h4>
          <div class="row justify-content-center">
            <div class="col-md-10 form-group">
              <input type="text" name="fullname" class="form-control"  placeholder="Nama Lengkap" required>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-10 form-group mt-2">
              <input type="text" name="no_hp" class="form-control"  placeholder="No Hp" required>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-10 form-group mt-2">
              <input type="email" name="email" class="form-control"  placeholder="Email" required>
              
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-10 form-group mt-2">
              <input type="text" name="name" class="form-control"  placeholder="Username" required>
              
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-10 form-group mt-2">
              <input type="password" class="form-control calendar" name="password" placeholder="Password" required>
              
            </div>
          </div>
        
          <div class="text-center">
            <button class="my-4" type="submit">Register</button>
            <p class="mb-5">Sudah punya akun? <a href="{{'login'}}">Login</a></p>
          </div>
        </div>
      </div>
    </form>
  </div>
</section><!-- End Book A Table Section -->
@endsection