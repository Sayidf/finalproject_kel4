@extends('back.index') 
@section('content') 
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12">
        <div class="row">
          <div class="col-xl-6">
            <div class="row">
              <div class="col-xl-12">
                <div class="card tryal-gradient">
                  <div class="card-body tryal row">
                    <div class="col-xl-7 col-sm-6">
                      <h2>Manage NF Culinary in one touch</h2>
                      <span>Let NF Culinary manage your project with our best Laravel systems</span>
                    </div>
                    <div class="col-xl-5 col-sm-6">
                      <img src="{{ url('/public/assets/img/chart.png') }}" alt="" class="sd-shape">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-body d-flex px-4 pb-0 justify-content-between">
                    <div>
                      <h4 class="fs-18 font-w600 mb-4 text-nowrap">Chart Harga Menu</h4>
                      <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                          <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                          <div class=""></div>
                        </div>
                      </div>
                      <canvas id="hrgMenu_chart" style="display: block; width: 672px; height: 336px;" width="672" height="336" class="chartjs-render-monitor"></canvas>
                      <script>
                        var lbl = [@foreach ($ar_menu as $mnu)'{{ $mnu->nama }}', @endforeach];
                        var hrg = [@foreach ($ar_menu as $mnu) {{ $mnu->harga }}, @endforeach];
                        document.addEventListener("DOMContentLoaded", () => {
                          new Chart(document.querySelector('#hrgMenu_chart'), {
                            type: 'bar',
                            data: {
                              defaultFontFamily: 'Poppins',
                              labels: lbl ,
                              datasets: [{
                                label: "Harga",
                                data: hrg,
                                backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(255, 159, 64, 0.2)',
                                  'rgba(255, 205, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                  'rgb(255, 99, 132)',
                                  'rgb(255, 159, 64)',
                                  'rgb(255, 205, 86)',
                                  'rgb(75, 192, 192)',
                                  'rgb(54, 162, 235)',
                                  'rgb(153, 102, 255)',
                                  'rgb(201, 203, 207)'
                                ],
                                borderWidth: "1",
                              }]
                            },
                            options: {
                              legend: false,
                              scales: {
                                yAxes: [{
                                  ticks: {
                                    beginAtZero: true
                                  }
                                }],
                                xAxes: [{
                                  // Change here
                                  barPercentage: 0.5
                                }]
                              }
                            }
                          });
                       });
                      </script>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="row">
              <div class="col-xl-12">
                <div class="row">
                  <div class="col-xl-6 col-sm-6">
                    <div class="card">
                      <div class="card-body d-flex px-4 pb-4 justify-content-center">
                        <div>
                          <h4 class="fs-18 font-w600 mb-4 text-nowrap ps-1">Chart Kategori Menu</h4>
                          <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                              <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                              <div class=""></div>
                            </div>
                          </div>
                          <canvas id="doughnutChart" style="max-height: 241px; width: 300px"></canvas>
                          <script>
                            var lbl2 = [@foreach ($ar_kategori as $k)'{{ $k->nama }}', @endforeach];
                            var jml = [@foreach ($ar_kategori as $k) {{ $k->jumlah }}, @endforeach];
                            var colors = [
                              ['rgba(101, 187, 166, 1)', 'rgba(101, 187, 166, 0.4)'],
                              ['rgba(108, 185, 189, 1)', 'rgba(108, 185, 189, 0.4)'],
                              ['rgba(128, 153, 186, 1)', 'rgba(128, 153, 186, 0.4)'],
                              ['rgba(143, 140, 189, 1)', 'rgba(143, 140, 189, 0.4)'],
                              ['rgba(159, 119, 184, 1)', 'rgba(159, 119, 184, 0.4)'],
                            ];
                            document.addEventListener("DOMContentLoaded", () => {
                              new Chart(document.querySelector('#doughnutChart'), {
                                type: 'doughnut',
                                data: {
                                  labels: lbl2,
                                  datasets: [{
                                    label: 'Kategori',
                                    data: jml,
                                    backgroundColor: ['rgb(108, 185, 189, 1)','rgb(128, 153, 186, 1)','rgb(143, 140, 189, 1)','rgb(159, 119, 184, 1)','rgb(166, 103, 160, 1)'],
                                    hoverBackgroundColor: ['rgb(108, 185, 189, 1)','rgb(128, 153, 186, 1)','rgb(143, 140, 189, 1)','rgb(159, 119, 184, 1)','rgb(166, 103, 160, 1)'],
                                    hoverBorderColor: ['rgb(108, 185, 189, 1)','rgb(128, 153, 186, 1)','rgb(143, 140, 189, 1)','rgb(159, 119, 184, 1)','rgb(166, 103, 160, 1)'],
                                    borderColor: ['rgb(108, 185, 189, 1)','rgb(128, 153, 186, 1)','rgb(143, 140, 189, 1)','rgb(159, 119, 184, 1)','rgb(166, 103, 160, 1)'],
                                    hoverBorderWidth: 10,
                                  }]
                                },
                                options: {
                                  plugins: {
                                    legend: {
                                      display: true,
                                      position: 'bottom',
                                      labels: {
                                        boxHwidth: 15,
                                        textAlign: 'left',
                                        usePointStyle: true,
                                        padding: 20,
                                      },
                                    }
                                  }
                                }
                              });
                            });
                          </script>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-sm-4">
                    <div class="row">
                      <div class="col-xl-12 col-sm-12">
                        <div class="widget-stat card">
                          <div class="card-body p-4">
                            <div class="media ai-icon">
                              <span class="me-3 bgl-primary text-primary">
                                <!-- <i class="ti-user"></i> -->
                                <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                              </span>
                              @foreach ($ar_customer as $totalUser)
                                <div class="media-body">
                                  <h6 class="mb-1">Total User</h6>
                                  <h4 class="fs-32 font-w700 mb-0">{{$totalUser->jumlah}}</h4>
                                  <span class="badge badge-primary">+{{$totalUser->jumlah}}</span>
                                </div>
                              @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-12 col-sm-12">
                        <div class="widget-stat card">
                          <div class="card-body p-4">
                            <div class="media">
                              <span class="me-3">
                                <i class="flaticon-381-calendar-1 text-success"></i>
                              </span>
                              @foreach ($ar_reservasi as $totalReservasi)
                                <div class="media-body">
                                  <h6 class="mb-1">Reservasi</h6>
                                  <h4 class="fs-32 font-w700 mb-0">{{$totalReservasi->jumlah}}</h4>
                                </div>
                              @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
@endsection