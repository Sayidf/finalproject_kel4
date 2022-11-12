@extends('landingpage.index')
@section('content')
<!-- ======= Book A Table Section ======= -->
<section id="book-a-table" class="book-a-table">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Login</h2>
      <p>Login With Your Account</p>
    </div>
    <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 form-group mt-3">
          <input type="text" name="name" class="form-control" id="name" placeholder="username" required>
          <div class="validate"></div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 form-group mt-3">
          <input type="password" class="form-control calendar" name="password" id="date" placeholder="password" required>
          <div class="validate"></div>
        </div>
      </div>

      
      <div class="text-center"><button type="submit">Login</button>
      <p class="mt-3">Belum punya akun? <a href="{{'register'}}">Register</a></p>
      </div>
      
    </form>
  </div>
</section><!-- End Book A Table Section -->
@endsection