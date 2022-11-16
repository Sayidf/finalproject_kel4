@extends('landingpage.index')
@section('content')
    <!--======= Hero Section =======-->

    <section id="hero" class="d-flex align-items-center">

        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
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
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="btn-close"></button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-8">
                    <h1>Welcome to <span>Nurul Fikri Culinary</span></h1>
                    <h2>Delivering great food for more than 18 years!</h2>
                    <div class="btns">
                        <a href="{{ url('/menu') }}" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
                        <a href="{{ url('/reservation') }}" class="btn-book animated fadeInUp scrollto">Book a
                            Table</a>
                    </div>
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in"
                    data-aos-delay="200">
                    <a href="" class="glightbox play-btn"></a>
                </div>
            </div>
        </div>
    </section>
    <!--======= End Hero Section =======-->
    <!--======= About Section =======-->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                    <div class="about-img">
                        <img src="{{ url('/public/assets/img/about.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h6 class="">Who Are We</h6>
                    <h3>
                        We Are Amongest Best For Providing Food
                    </h3>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit.
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.
                    </p>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                        sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--======= End About Section =======-->
@endsection
