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
            @if (Auth::check())
                <a href="{{ route('reservasi.create') }}" class="book-a-table-btn d-none d-lg-flex">Book a table</a>
                <span class="mt-2 mx-3">|</span>
                <div class="nav-link mt-2 dropdown">
                    <a class=" dropdown-toggle" href="#" style="color: white" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->fullname }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="{{ url('sesi/logout') }}">Logout</a></li>

                    </ul>
                </div>
                {{-- <a class="nav-link mt-2" href="{{ url('sesi/logout') }}"><i
                        class='bx bx-log-out-circle'></i>&nbsp;Logout</a> --}}
            @else
                <a class="nav-link mt-2" href="{{ url('/sesi') }}"><i class='bx bx-log-in-circle'></i>
                    &nbsp;Login</a>
            @endif


        </div>
    </div>
</header>
