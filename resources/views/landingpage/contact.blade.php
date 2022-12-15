@extends('landingpage.index')
@section('content')
<!--======= Contact Section =======-->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Contact</h2>
      <p>Contact Us</p>
    </div>
  </div>
  <div data-aos="fade-up">
    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7930.6977613122335!2d106.8284127!3d-6.3488533!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed2a567b08b7%3A0xcfcc14e765e28fe6!2sNF%20COMPUTER!5e0!3m2!1sen!2sid!4v1667198336320!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
  </div>
  <div class="container" data-aos="fade-up">
    <div class="row mt-5">
      <div class="col-lg-12">
        <div class="info d-flex justify-content-around">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Location:</h4>
            <p>Jl. Raya Lenteng Agung No. 20</p>
          </div>
          <div class="open-hours m-0">
            <i class="bi bi-clock"></i>
            <h4>Open Hours:</h4>
            <p>
              Monday-Saturday:<br>
              11:00 AM - 23.00 PM
            </p>
          </div>
          <div class="email m-0">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>info@example.com</p>
          </div>
          <div class="phone m-0">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>+62 851-0218-5441</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--======= End Content Section =======-->
@endsection