<div class="nav-header">
  <a href="{{ url('/home') }}" class="brand-logo">
    <svg class="logo-abbr" width="55" height="55" viewbox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M27.5 0C12.3122 0 0 12.3122 0 27.5C0 42.6878 12.3122 55 27.5 55C42.6878 55 55 42.6878 55 27.5C55 12.3122 42.6878 0 27.5 0ZM28.0092 46H19L19.0001 34.9784L19 27.5803V24.4779C19 14.3752 24.0922 10 35.3733 10V17.5571C29.8894 17.5571 28.0092 19.4663 28.0092 24.4779V27.5803H36V34.9784H28.0092V46Z" fill="url(#paint0_linear)"></path>
      <defs></defs>
    </svg>
    <div class="brand-title">
      <h2 class="">NF Culinary</h2>
      <span class="brand-sub-title">Restaurant</span>
    </div>
  </a>
  <div class="nav-control">
    <div class="hamburger">
      <span class="line"></span>
      <span class="line"></span>
      <span class="line"></span>
    </div>
  </div>
</div>
<!--**********************************
  Nav header end
***********************************-->
<!--**********************************
  Header start
***********************************-->
<div class="header border-bottom">
  <div class="header-content">
    <nav class="navbar navbar-expand">
      <div class="collapse navbar-collapse justify-content-between">
        <div class="header-left">
          <div class="dashboard_bar"> Halaman Admin </div>
        </div>
        <ul class="navbar-nav header-right">
          <li class="nav-item ">
            <span id="DisplayClock" class="clock fw-bold" onload="showTime()"></span>
          </li>
          <li class="nav-item">
            <a href="app-profile.html">
              <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
              <span class="ms-2">Profile </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="page-error-404.html">
              <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
              </svg>
              <span class="ms-2">Logout </span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>
<script>
  function showTime() {
    var date = new Date();
    var h = date.getHours();
    var m = date.getMinutes();
    var s = date.getSeconds();
    var session = "AM";
    if (h == 0) {
      h = 12;
    }
    if (h > 12) {
      h = h - 12;
      session = "PM";
    }
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("DisplayClock").innerText = time;
    document.getElementById("DisplayClock").textContent = time;
    setTimeout(showTime, 1000);
  }
  showTime();
</script>