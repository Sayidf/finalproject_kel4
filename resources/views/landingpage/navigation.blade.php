<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
    <h1 class="logo me-auto me-lg-0"><a href="{{ url('/home') }}">NF Culinary</a></h1>
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link nav-72 {{ (request()->segment(1) == 'home' || '') ? 'active' : '' }}" href="{{ url('/home') }}">Home</a></li>
        <li><a class="nav-link nav-72 {{ (request()->segment(1) == 'menu') ? 'active' : '' }}" href="{{ url('/menu') }}">Menu</a></li>
        <li><a class="nav-link nav-72 {{ (request()->segment(1) == 'specials') ? 'active' : '' }}" href="{{ url('/specials') }}">Specials</a></li>
        <li><a class="nav-link nav-72 {{ (request()->segment(1) == 'gallery') ? 'active' : '' }}" href="{{ url('/gallery') }}">Gallery</a></li>
        <li><a class="nav-link nav-72 {{ (request()->segment(1) == 'contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a></li>
        {{-- Navbar Reservasi (Mobile) --}}
        <li class="custom-navbar-mobile d-none ">
          <div class="border-1">
            @if (Auth::check())
              <div class="d-none"></div>
            @else
              <a href="{{ url('/login') }}" class="reservation-nav nav-72 px-3" title="Reservasi">
                Reservation
              </a>
            @endif
          </div> 
        </li>
        {{-- Navbar Profile (Mobile) --}}
        <li class="custom-navbar-mobile d-none mt-2">
          <div class="border-top border-bottom border-1">
            @if (Auth::check())
              <a href="#">
                <div class="row">
                  <span class="text-tiny mt-1">Profile</span>
                  <span class="fw-bold">{{ Auth::user()->fullname }}</span>
                </div>
              </a>
              @if(Auth::user()->role == 'admin')
                <a href="{{ url('/administrator') }}">Menu Admin</a>
              @else
                <a href="{{ url('/reservasi') }}" class="reservation-nav nav-72 px-3 {{ (request()->segment(1) == 'reservasi') ? 'active' : '' }}">Tambah Reservasi</a>
                <a href="{{ url('/data-reservasi' . '/' . Auth::user()->id) }}" class="reservation-nav nav-72 px-3 {{ (request()->segment(1) == 'data-reservasi') ? 'active' : '' }}">Data Reservasi</a>
              @endif 
              <a href="{{ url('sesi/logout') }}">Logout</a>
            {{-- Jika belum login tampilkan tombol login --}}
            @else
              <a href="{{ url('/login') }}" class="">Login atau Register</a>  
            @endif
          </div>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>

			<div class="navbar navbar-user">
				<ul>          
          @if (Auth::check())
            @if (Auth::user()->role == 'admin')
              <div class="d-none"></div>
            @else
              <li class="dropdown text-dark reservation-nav">
                <a href="#" class="btn-cart px-3 nav-72">
                  <i class="fs-6 fa-regular fa-calendar-clock"></i>
                </a>
                <ul>
                  <a href="{{ url('/reservasi') }}">Tambah Reservasi</a>
                  <a href="{{ url('/data-reservasi' . '/' . Auth::user()->id) }}">Data Reservasi</a>
                </ul>
              </li>
            @endif
          @else
            <a href="{{ url('/login') }}" class="reservation-nav nav-72 px-3" title="Reservasi">
              <i class="fs-6 fa-regular fa-calendar-clock"></i>
            </a>
          @endif
          @if (Auth::check() && Auth::user()->role == 'admin')
            <div class="d-none"></div>
          @else
          
            <li class="dropdown cart-nav">        
              {{-- <button type="button" class="btn me-3 btn-cart text-white" data-toggle="dropdown">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="badge badge-pill ms-2">{{ count((array) session('cart')) }}</span>
              </button> --}}
              <a href="#" class="btn-cart px-3 nav-72">
                <i class="fs-6 fa fa-shopping-cart"></i> 
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">{{ count((array) session('cart')) }}</span>
              </a>
              {{-- <button type="button" class="btn btn-book btn-cart text-white" data-toggle="dropdown">
                <i class="fa fa-shopping-cart"></i> 
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">{{ count((array) session('cart')) }}</span>
              </button> --}}
              <ul style="min-width:300px">
                <li>
                  @php $total = 0 @endphp
                  @foreach ((array) session('cart') as $id => $details)
                    @php $total += $details['harga'] * $details['quantity'] @endphp
                  @endforeach
                  @if (count((array) session('cart')) == 0)
                    <div class="border-0 bg-menu text-dark w-100 card">
                      <div class="text-left card-body"><span class="text-small">Silahkan pilih menu terlebih dahulu</span></div>
                    </div>
                  @else
                    <div class="border-0 bg-menu text-dark w-100 card">
                      <div class="text-left card-body"><span class="text-small">Ada <b>{{ count((array) session('cart')) }}</b> menu di keranjang Anda</span></div>
                    </div>
                    <div class="scrollable-menu">
                      @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                          <div class="m-3 border-0 bg-menu text-dark card">
                            <div class="card-body p-0 border-bottom border-2 border-light">
                              <div class="row mb-1">
                                <div class="col-3 cart-menu-img">
                                  @empty($details['foto'])
                                    <img src="{{ url('/public/assets/img/menu/placeholder.jpg') }}">
                                  @else
                                    <img src="{{ url('/public/assets/img/menu') }}/{{ $details['foto'] }}">
                                  @endempty
                                </div>
                                <div class="col">
                                  <div class="mt-1">
                                    <span class="fw-bold text-small">{{ $details['nama'] }}</span>
                                    <p class="text-secondary"><small>Rp {{ number_format($details['harga'], 0, ',', '.') }}&nbsp;&nbsp;|&nbsp;&nbsp;Qty : {{ $details['quantity'] }}</small></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      @endif
                    </div>
                    <div class="border-0 bg-menu text-dark text-cart card">
                      <div class="card-body">
                        <p><span>Subtotal : </span><b class="float-end">Rp {{ number_format($total, 0, ',', '.') }}</b></p>
                          @if (Auth::check())
                            <a href="{{ url('/cart' . '/' . Auth::user()->id) }}" class="btn btn-primary text-white text-center cart-button">Lihat Keranjang</a> 
                          @else
                            <a href="{{ url('/cart') }}" class="btn btn-primary text-white text-center cart-button">Lihat Keranjang</a> 
                          @endif
                      </div>
                    </div>  
                  @endif              
                </li>
              </ul>
            </li>
          @endif

					<li class="dropdown text-dark user-nav">
            <a href="#" class="btn-cart px-3 nav-72">
              <i class="fs-6 fa fa-user"></i> 
            </a>
      	    <ul class="p-0" style="width:200px">
              {{-- Jika sudah login tampilkan detail user --}}
              <div class="border-0 card card-user-nav">
                <div class="card-body">
                  @if (Auth::check())
                    <span class="text-tiny mt-1">Welcome</span>
                    <p class="fw-bold border-bottom border-1 border-dark pb-3">{{ Auth::user()->fullname }}</p>
                    @if(Auth::user()->role == 'admin')
                      <a href="{{ url('/administrator') }}" class="my-3">Menu Admin</a>
                    @endif 
                    <a href="{{ url('sesi/logout') }}">Logout</a>
                  {{-- Jika belum login tampilkan tombol login --}}
                  @else
                    <li class="text-center"><a href="{{ url('/login') }}" class="text-center d-block">Login atau Register</a></li>  
                  @endif
                </div>
              </div>
      	    </ul>
      	  </li>
          
				</ul>
			</div>
      {{-- <a class="nav-link mt-2" href="{{ url('sesi/logout') }}"><i
              class='bx bx-log-out-circle'></i>&nbsp;Logout</a> --}}

      {{-- <a class="nav-link mt-2 login-button {{ (request()->segment(1) == 'login') ? 'active' : '' }}" href="{{ url('/login') }}"><i class='bx bx-log-in-circle'></i>&nbsp;Login</a> --}}

  </div>
</header>
                {{-- <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                </li> --}}