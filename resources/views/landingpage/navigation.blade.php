<header id="header" class="fixed-top d-flex align-items-cente">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">
    <h1 class="logo me-auto me-lg-0"><a href="{{ url('/home') }}">Nurul Fikri</a></h1>
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto" href="{{ url('/home') }}">Home</a></li>
        <li><a class="nav-link scrollto" href="{{ url('/about') }}">About</a></li>
        <li><a class="nav-link scrollto" href="{{ url('/menu') }}">Menu</a></li>
        <li><a class="nav-link scrollto" href="{{ url('/specials') }}">Specials</a></li>
        <li><a class="nav-link scrollto" href="{{ url('/events') }}">Events</a></li>
        <li><a class="nav-link scrollto" href="{{ url('/chefs') }}">Chefs</a></li>
        <li><a class="nav-link scrollto" href="{{ url('/gallery') }}">Gallery</a></li>
        <li><a class="nav-link scrollto" href="{{ url('/contact') }}">Contact</a></li>
        <li><a class="nav-link scrollto" href="{{ url('/administrator') }}">Admin</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
    <a href="{{ url('/reservation') }}" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>
  </div>
</header>