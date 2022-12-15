@extends('landingpage.index')
@section('content')
<!--====== Special Section ======-->
<section id="specials" class="specials">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Specials</h2>
      <p>Check Our Specials</p>
    </div>
    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-3">
        <ul class="nav nav-tabs flex-column">
          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Nasi Goreng Spesial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Bawal Goreng</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Ayam Sambal Merah</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Nasi Goreng Spesial</h3>
                <p>Nasi goreng merupakan salah satu makanan khas yang Sering ditemukan di berbagai daerah di Indonesia. Disajikan dalam berbagai varian rasa yang dapat disesuaikan dengan keinginan para konsumen. Aroma khas dari bumbu nasi goreng akan membuat siapapun yang menciumnya merasa kelaparan.</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="{{ url('/public/assets/img/specials-1.png') }}" alt="" class="img-fluid">
              </div>
            </div>
          </div> 
          <div class="tab-pane" id="tab-2">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Bawal Goreng</h3>
                <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="{{ url('/public/assets/img/specials-2.png') }}" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-3">
            <div class="row">
              <div class="col-lg-8 details order-2 order-lg-1">
                <h3>Ayam Sambal Merah</h3>
                <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
              </div>
              <div class="col-lg-4 text-center order-1 order-lg-2">
                <img src="{{ url('/public/assets/img/specials-3.png') }}" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--====== End Special Section ======-->
@endsection