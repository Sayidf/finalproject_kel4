@extends('back.index')
@section('content')
<div class="content-body">
  <div class="container-fluid">
    <div class="row page-titles">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">
          <a href="javascript:void(0)">Charts</a>
        </li>
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">ChartJS</a>
        </li>
      </ol>
    </div>
    <!-- row -->
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-xl-6 col-lg-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Chart Harga Menu</h4>
              </div>
              <div class="card-body">
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
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Chart Banyak Kategori</h4>
              </div>
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <canvas id="doughnutChart" style="max-height: 300px;"></canvas>
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
          <div class="col-xl-6 col-lg-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Gradient Bar Chart</h4>
              </div>
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <canvas id="barChart_2" style="display: block; width: 672px; height: 336px;" width="672" height="336" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Stalked Bar Chart</h4>
              </div>
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <canvas id="barChart_3" style="display: block; width: 672px; height: 336px;" width="672" height="336" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Basic Line Chart</h4>
              </div>
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <canvas id="lineChart_1" style="display: block; width: 672px; height: 336px;" width="672" height="336" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Gradient Line Chart</h4>
              </div>
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <canvas id="lineChart_2" style="display: block; width: 672px; height: 336px;" width="672" height="336" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Dual Line Chart</h4>
              </div>
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <canvas id="lineChart_3" style="display: block; width: 672px; height: 336px;" width="672" height="336" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Basic Area Chart</h4>
              </div>
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <canvas id="areaChart_1" style="display: block; width: 672px; height: 336px;" width="672" height="336" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Gradinet Area Chart</h4>
              </div>
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <canvas id="areaChart_2" style="display: block; width: 672px; height: 336px;" width="672" height="336" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Dual Area Chart</h4>
              </div>
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <canvas id="areaChart_3" style="display: block; width: 672px; height: 336px;" width="672" height="336" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Radar Chart</h4>
              </div>
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <canvas id="radar_chart" style="display: block; width: 672px; height: 295px;" width="672" height="295" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Pie Chart</h4>
              </div>
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <canvas id="pie_chart" style="display: block; width: 672px; height: 150px;" width="672" height="150" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Polar Chart</h4>
              </div>
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <canvas id="polar_chart" style="display: block; width: 672px; height: 150px;" width="672" height="150" class="chartjs-render-monitor"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection