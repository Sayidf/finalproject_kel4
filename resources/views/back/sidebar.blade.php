<div class="dlabnav">
  <div class="dlabnav-scroll">
    <ul class="metismenu" id="menu">
      <li>
        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
          <i class="fas fa-home"></i>
          <span class="nav-text">Dashboard</span>
        </a>
        <ul aria-expanded="false">
          <li>
            <a href="{{ url('/administrator') }}">Beranda</a>
          </li>
        </ul>
      </li>
      <li>
        <a class="has-arrow " href="javascript:void()" aria-expanded="false">
          <i class="fas fa-database"></i>
          <span class="nav-text">Master Data</span>
        </a>
        <ul aria-expanded="false">
          <li>
            <a href="{{ url('administrator/menu') }}">Data Menu</a>
          </li>
          <li>
            <a href="{{ url('administrator/meja') }}">Data Meja</a>
          </li>
          <li>
            <a href="{{ url('administrator/kategori') }}">Data Kategori Menu</a>
          </li>
          <li>
            <a href="{{ url('administrator/reservasi') }}">Data Reservasi</a>
          </li>
          <li>
            <a href="{{ url('administrator/customer') }}">Data Customers</a>
          </li>
          <li>
            <a href="{{ url('administrator/pembayaran') }}">Data Pembayaran</a>
          </li>
        </ul>
      </li>
    </ul>
    <div class="copyright">
      <p>
        <strong>NF Culinary Admin</strong> © 2022 Final Project SIB 3
      </p>
      <p class="fs-12">Made with <span class="heart"></span> Kelompok 4 </p>
    </div>
  </div>
</div>
