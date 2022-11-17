@extends('landingpage.index')
@section('content')
<!--======= Login Section =======-->
<section id="login" class="login">
  <div class="container" data-aos="fade-up">
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="sesi/login" method="POST" role="form" data-aos="fade-up" data-aos-delay="100">
      @csrf
      <div class="d-flex justify-content-center">
        <div class="card bg-dark">
          <h4 class="text-center my-5">Log in</h4>
          <div class="row justify-content-center">
            <div class="col-md-10 form-group username-input">
              <input type="text" name="username" class="form-control with-icon" value="{{ Session::get('username') }}" placeholder="Username">
              <div class="validate"></div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-10 form-group password-input mt-2">
              <input type="password" class="form-control with-icon" name="password" placeholder="Password">
              <div class="validate"></div>
            </div>
          </div>
          <div class="text-center">
            <button class="my-4" name="submit" type="submit">Login</button>
            <p class="mb-5">Belum punya akun? <a href="{{ 'reg' }}">Register</a></p>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<!--====== End Login Section ======-->
@endsection
