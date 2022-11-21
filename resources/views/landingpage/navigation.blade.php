<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
        <h1 class="logo me-auto me-lg-0"><a href="{{ url('/home') }}">NF Culinary</a></h1>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto" href="{{ url('/home') }}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{ url('/menu') }}">Menu</a></li>
                <li><a class="nav-link scrollto" href="{{ url('/specials') }}">Specials</a></li>
                <li><a class="nav-link scrollto" href="{{ url('/chefs') }}">Chefs</a></li>
                <li><a class="nav-link scrollto" href="{{ url('/gallery') }}">Gallery</a></li>
                <li><a class="nav-link scrollto" href="{{ url('/contact') }}">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <div class="justify-content-center d-flex">
            <div class="dropdown">
                <button type="button" class="btn btn-book me-3" style="color: #cda45e" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill"
                        style="background: red">{{ count((array) session('cart')) }}</span>
                </button>
                <div class="dropdown-menu mt-2 p-2" style="width: 300px">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span
                                class="badge badge-pill badge-info"
                                style="background: red">{{ count((array) session('cart')) }}</span>
                        </div>
                        @php $total = 0 @endphp
                        @foreach ((array) session('cart') as $id => $details)
                            @php $total += $details['harga'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span style="color:#cda45e">Rp.{{ $total }}</span></p>
                        </div>
                    </div>
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img mt-2">
                                    <img src="{{ url('/public/assets/img/menu') }}/{{ $details['foto'] }}"
                                        style="width:60px">
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product mt-2">
                                    <p class="fw-bold mb-1">{{ $details['nama'] }}</p>
                                    <span class="me-2" style="font-size: 12px; font-weight:500; color:#cda45e">
                                        Rp.{{ $details['harga'] }}</span> <span class="count" style="color: #c2c2dc">
                                        Quantity: {{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout mt-3">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::check())
                <a href="{{ route('reservasi.create') }}" class="book-a-table-btn d-none d-lg-flex">Book a table</a>
                <span class="mt-2 mx-3">|</span>
                <div class="navbar navbar-user">
                    <ul>
                        <li class="dropdown"><a href="#"><span>{{ Auth::user()->fullname }}</span> <i
                                    class="bi bi-caret-down-fill"></i></a>
                            <ul>
                                <li><a href="{{ url('sesi/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                {{-- <a class="nav-link mt-2" href="{{ url('sesi/logout') }}"><i
                class='bx bx-log-out-circle'></i>&nbsp;Logout</a> --}}
            @else
                <a class="nav-link mt-2" href="{{ url('/login') }}"><i class='bx bx-log-in-circle'></i>&nbsp;Login</a>
            @endif
        </div>
    </div>
</header>
