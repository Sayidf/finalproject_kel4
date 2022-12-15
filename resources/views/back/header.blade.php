<div class="nav-header">
    <a href="{{ url('/home') }}" class="brand-logo ps-2">
        <img width="80" src="{{ url('/public/assets/img/logo.png') }}">
        <div class="brand-title">
            <h2 class="">NU&nbsp;Culinary</h2>
            <span class="brand-sub-title">Resto & Cafe</span>
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
                            <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18"
                                height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span class="ms-2">{{ Auth::user()->fullname }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('sesi/logout') }}">
                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                                height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
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
