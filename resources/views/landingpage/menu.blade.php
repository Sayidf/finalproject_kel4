@extends('landingpage.index')
@section('content')
@php
  //select option kategori
  $ar_menu = App\Models\Menu::all();
  $kategori_1 = App\Models\Menu::where('id_kategori', 1)->get();
  $kategori_2 = App\Models\Menu::where('id_kategori', 2)->get();
  $kategori_3 = App\Models\Menu::where('id_kategori', 3)->get();
  $kategori_4 = App\Models\Menu::where('id_kategori', 4)->get();
  $kategori_5 = App\Models\Menu::where('id_kategori', 5)->get();
@endphp
<!--======= Menu Section =======-->
<section id="menu" class="menu section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Menu</h2>
      <p>Check Our Tasty Menu</p>
    </div>
    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        {{-- <ul id="menu-flters">
          <li data-filter="*" class="filter-active">All</li>
          <li class="filter-active show" data-filter=".filter-rice">Rice</li>
          <li data-filter=".filter-fish">Fish</li>
          <li data-filter=".filter-chicken">Chicken</li>
          <li data-filter=".filter-salads">Salads</li>
          <li data-filter=".filter-drink">Drink</li>
        </ul> --}}
        <!-- Menu -->
        <ul class="nav nav-menu mb-4" role="tablist">
          <!-- Menu Nasi -->
          <li class="nav-item" role="presentation">
            <a class="active show" data-bs-toggle="tab" data-bs-target="#menu-rice" aria-selected="false" role="tab">
							<div>
              	<i class="fa-solid fa-bowl-rice"></i>
								<h6>Rice</h6>
							</div>
            </a>
          </li>
          <!-- Menu Ikan -->
          <li class="nav-item" role="presentation">
            <a class="" data-bs-toggle="tab" data-bs-target="#menu-fish" aria-selected="false" tabindex="-1" role="tab">
							<div>
								<i class="fa-solid fa-fish"></i>
								<h6>Fish</h6>
							</div>
            </a>
          </li>
          <!-- Menu Ayam -->
					<li class="nav-item" role="presentation">
            <a class="" data-bs-toggle="tab" data-bs-target="#menu-chicken" aria-selected="false" tabindex="-1" role="tab">
              <div>
								<i class="fa-solid fa-drumstick"></i>
								<h6>Chicken</h6>
							</div>
            </a>
          </li>
          <!-- Menu Sayuran -->
          <li class="nav-item" role="presentation">
            <a class="" data-bs-toggle="tab" data-bs-target="#menu-salads" aria-selected="false" tabindex="-1" role="tab">
              <div>
								<i class="fa-solid fa-salad"></i>
								<h6>Salads</h6>
							</div>
            </a>
          </li>
          <!-- Menu Minuman -->
          <li class="nav-item" role="presentation">
            <a class="" data-bs-toggle="tab" data-bs-target="#menu-drink" aria-selected="false" tabindex="-1" role="tab">
              <div>
								<i class="fa-solid fa-glass"></i>
								<h6>Drink</h6>
							</div>
            </a>
          </li>
        </ul>
        <!-- End Menu -->
      </div>
    </div>
    <div class="tab-content aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
      <!-- Konten Menu Nasi -->
      <div class="tab-pane fade active show" id="menu-rice" role="tabpanel">
        <div class="tab-header text-center">
          <h3>Rice</h3>
        </div>
				<div class="row">
          @foreach ($kategori_1 as $row)
        	<div class="col-lg-6 menu-item">
            @empty($row->foto)
              <img src="{{ url('/public/assets/img/menu/placeholder.jpg') }}"alt="Menu" class="menu-img">
            @else
              <img src="{{ url('/public/assets/img/menu')}}/{{$row->foto}}"alt="Menu" class="menu-img">
            @endempty
        	  <div class="menu-content"> 
        	    <a href="#">{{ $row->nama }}</a><span>{{ $row->harga }}</span>
        	  </div>
        	  <div class="menu-ingredients ps-2">
              {{ $row->ket }}
        	  </div>
        	</div>
          @endforeach
				</div>
			</div>
      <!-- Konten Menu Ikan -->
			<div class="tab-pane fade" id="menu-fish" role="tabpanel">
        <div class="tab-header text-center">
          <h3>Fish</h3>
        </div>
				<div class="row">
          @foreach ($kategori_2 as $row)
        	<div class="col-lg-6 menu-item">
            @empty($row->foto)
              <img src="{{ url('/public/assets/img/menu/placeholder.jpg') }}"alt="Menu" class="menu-img">
            @else
              <img src="{{ url('/public/assets/img/menu')}}/{{$row->foto}}"alt="Menu" class="menu-img">
            @endempty
        	  <div class="menu-content"> 
        	    <a href="#">{{ $row->nama }}</a><span>{{ $row->harga }}</span>
        	  </div>
        	  <div class="menu-ingredients ps-2">
              {{ $row->ket }}
        	  </div>
        	</div>
          @endforeach
				</div>
			</div>
      <!-- Konten Menu Ayam -->
			<div class="tab-pane fade" id="menu-chicken" role="tabpanel">
        <div class="tab-header text-center">
          <h3>Chicken</h3>
        </div>
				<div class="row">
          @foreach ($kategori_3 as $row)
        	<div class="col-lg-6 menu-item">
            @empty($row->foto)
              <img src="{{ url('/public/assets/img/menu/placeholder.jpg') }}"alt="Menu" class="menu-img">
            @else
              <img src="{{ url('/public/assets/img/menu')}}/{{$row->foto}}"alt="Menu" class="menu-img">
            @endempty
        	  <div class="menu-content"> 
        	    <a href="#">{{ $row->nama }}</a><span>{{ $row->harga }}</span>
        	  </div>
        	  <div class="menu-ingredients ps-2">
              {{ $row->ket }}
        	  </div>
        	</div>
          @endforeach
				</div>
			</div>
      <!-- Konten Menu Sayuran -->
			<div class="tab-pane fade" id="menu-salads" role="tabpanel">
        <div class="tab-header text-center">
          <h3>Salads</h3>
        </div>
				<div class="row">
          @foreach ($kategori_4 as $row)
        	<div class="col-lg-6 menu-item">
            @empty($row->foto)
              <img src="{{ url('/public/assets/img/menu/placeholder.jpg') }}"alt="Menu" class="menu-img">
            @else
              <img src="{{ url('/public/assets/img/menu')}}/{{$row->foto}}"alt="Menu" class="menu-img">
            @endempty
        	  <div class="menu-content"> 
        	    <a href="#">{{ $row->nama }}</a><span>{{ $row->harga }}</span>
        	  </div>
        	  <div class="menu-ingredients ps-2">
              {{ $row->ket }}
        	  </div>
        	</div>
          @endforeach
				</div>
			</div>
      <!-- Konten Menu Minuman -->
			<div class="tab-pane fade" id="menu-drink" role="tabpanel">
        <div class="tab-header text-center">
          <h3>Drink</h3>
        </div>
				<div class="row">
          @foreach ($kategori_5 as $row)
        	<div class="col-lg-6 menu-item">
            @empty($row->foto)
              <img src="{{ url('/public/assets/img/menu/placeholder.jpg') }}"alt="Menu" class="menu-img">
            @else
              <img src="{{ url('/public/assets/img/menu')}}/{{$row->foto}}"alt="Menu" class="menu-img">
            @endempty
        	  <div class="menu-content"> 
        	    <a href="#">{{ $row->nama }}</a><span>{{ $row->harga }}</span>
        	  </div>
        	  <div class="menu-ingredients ps-2">
              {{ $row->ket }}
        	  </div>
        	</div>
          @endforeach
				</div>
			</div>
    </div>
    {{-- <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
      <div class="col-lg-6 menu-item filter-rice">
        <img src="https://imgs.search.brave.com/ayCGV163wL7_8zo5dqDeFENLzkavod8-nyZy5bAqh5A/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9pMi53/cC5jb20vY2hpbGlw/ZXBwZXJtYWRuZXNz/LmNvbS93cC1jb250/ZW50L3VwbG9hZHMv/MjAyMC8xMS9OYXNp/LUdvcmVuZy1JbmRv/bmVzaWFuLUZyaWVk/LVJpY2UtU1EuanBn" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Nasi Goreng Seafood</a><span>30K</span>
        </div>
        <div class="menu-ingredients">
        </div>
      </div>
      <div class="col-lg-6 menu-item filter-rice">
        <img src="https://imgs.search.brave.com/ayCGV163wL7_8zo5dqDeFENLzkavod8-nyZy5bAqh5A/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9pMi53/cC5jb20vY2hpbGlw/ZXBwZXJtYWRuZXNz/LmNvbS93cC1jb250/ZW50L3VwbG9hZHMv/MjAyMC8xMS9OYXNp/LUdvcmVuZy1JbmRv/bmVzaWFuLUZyaWVk/LVJpY2UtU1EuanBn" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Nasi Goreng Spesial</a><span>20K</span>
        </div>
        <div class="menu-ingredients">
        </div>
      </div>
      <div class="col-lg-6 menu-item filter-fish">
        <img src="https://imgs.search.brave.com/ZBOCZf4B_TvfU2jpw2Kfef1evI7T1gL096lp9I0rPoo/rs:fit:546:225:1/g:ce/aHR0cHM6Ly90c2Uy/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5z/QnZkLUZKbWFYMWVh/Rm9wUXJva1FRSGFH/YiZwaWQ9QXBp" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Gurami Goreng</a><span>80K</span>
        </div>
        <div class="menu-ingredients">
        </div>
      </div>
      <div class="col-lg-6 menu-item filter-fish">
        <img src="https://imgs.search.brave.com/haLOsIA8FyB1a0athnQWr3ioReqtIIX7F_Gkut7XQNQ/rs:fit:474:225:1/g:ce/aHR0cHM6Ly90c2U0/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC45/aHhoVW92SEsyM3FN/OG1kcEQ0ZDZRSGFI/YSZwaWQ9QXBp" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Kakap Goreng</a><span>80K</span>
        </div>
        <div class="menu-ingredients">
        </div>
      </div>
      <div class="col-lg-6 menu-item filter-fish">
        <img src="https://imgs.search.brave.com/2gkJOSEI2pzTcof06pWAhMQ6XhDxYWXnOe9Ktn_T8eo/rs:fit:474:225:1/g:ce/aHR0cHM6Ly90c2Uy/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5B/T1ZMbjZnQzc0ZlF3/ZHd0U3ZRY2d3SGFI/YSZwaWQ9QXBp" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Bawal Goreng</a><span>80K</span>
        </div>
        <div class="menu-ingredients">
        </div>
      </div>
      <div class="col-lg-6 menu-item filter-chicken">
        <img src="https://imgs.search.brave.com/sTRXwRXm-hti7DKy6wHbivh_a2qon4dwYbvlg2nPc7g/rs:fit:556:225:1/g:ce/aHR0cHM6Ly90c2U0/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC51/M042RFBraDNteXpI/ZldoeEdTa2N3SGFH/VSZwaWQ9QXBp" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Ayam Bistik</a><span>40K</span>
        </div>
        <div class="menu-ingredients">
        </div>
      </div>
      <div class="col-lg-6 menu-item filter-chicken">
        <img src="https://imgs.search.brave.com/whaTh1esiWVzw4DdcSyWuPHrKojmxhkDGu6TkotAa00/rs:fit:478:225:1/g:ce/aHR0cHM6Ly90c2U0/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5w/MElDY1ZWa0dQVk00/cjN5RTlBQ1Z3SGFI/VyZwaWQ9QXBp" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Ayam Goreng</a><span>40K</span>
        </div>
        <div class="menu-ingredients">
        </div>
      </div>
      <div class="col-lg-6 menu-item filter-salads">
        <img src="https://imgs.search.brave.com/6KZvaYqgshchlWSmwQsQ5j1wT_Cln-MZSS6jF6gR37c/rs:fit:474:225:1/g:ce/aHR0cHM6Ly90c2Uy/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5i/OC1kV21acmYzR3J2/MlgyV1NWZEFRSGFI/YSZwaWQ9QXBp" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Kangkung</a><span>20K</span>
        </div>
        <div class="menu-ingredients">
        </div>
      </div>
      <div class="col-lg-6 menu-item filter-salads">
        <img src="https://imgs.search.brave.com/X_i6Q_fzfnqpXgWRo3NTDuCnAHU5_hDk8Rz9vsU1W7M/rs:fit:474:225:1/g:ce/aHR0cHM6Ly90c2Ux/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5I/V2wwT1A4c0VIWHBh/R2ZyU1ZEeDhRSGFI/YSZwaWQ9QXBp" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Brokoli</a><span>20K</span>
        </div>
        <div class="menu-ingredients">
        </div>
      </div>
      <div class="col-lg-6 menu-item filter-drink">
        <img src="https://imgs.search.brave.com/xhp8wo4qYafX2H5pQm1VDXJWUuxBQ0Ao70hFt1kMdzE/rs:fit:474:225:1/g:ce/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5y/Q3RxWVdyS0twa3Rm/VVpxTHhqNHBBSGFI/YSZwaWQ9QXBp" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Teh Manis</a><span>10K</span>
        </div>
        <div class="menu-ingredients">
        </div>
      </div>
      <div class="col-lg-6 menu-item filter-drink">
        <img src="https://imgs.search.brave.com/esjCMEiSSeHE2Sy-kS0_FgsFIo8DDEt_GHHDp4ZebGQ/rs:fit:1080:1080:1/g:ce/aHR0cHM6Ly93d3cu/d2FuZGVyY29va3Mu/Y29tL3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDIxLzA0L21hbGF5/c2lhbi1wdWxsZWQt/dGVhLXRlaC10YXJp/ay0yLTEwODB4MTA4/MC5qcGc" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Teh Tarik</a><span>10K</span>
        </div>
        <div class="menu-ingredients">
        </div>
      </div>
      <div class="col-lg-6 menu-item filter-drink">
        <img src="https://imgs.search.brave.com/0m8Pp4JCqnakgbOS6W70FUxsp-rBSABVo_PbAHc-2t0/rs:fit:474:225:1/g:ce/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5U/cC01a25nR2FESDU0/TDZwYW43SExRSGFI/YSZwaWQ9QXBp" class="menu-img" alt="">
        <div class="menu-content">
          <a href="#">Kopi</a><span>10K</span>
        </div>
        <div class="menu-ingredients">
        </div>
      </div>
    </div> --}}
  </div>
</section>
<!--======= End Menu Section =======-->
@endsection
