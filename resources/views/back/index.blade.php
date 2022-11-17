<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	<meta name="_token" content="{{ csrf_token() }}" />
	
	<!-- PAGE TITLE HERE -->
	<title>Admin Dashboard</title>
	
	<!-- FAVICONS ICON -->
	<link href="https://learn.nurulfikri.com/pluginfile.php/1/theme_edumy/favicon/1653270284/nci.png" rel="shortcut icon">

	<link href="{{asset('/public/assets/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link href="{{asset('/public/assets/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
	<link href="{{asset('/public/assets/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/public/assets/vendor/nouislider/nouislider.min.css')}}">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<!-- Datatable -->
  <link href="{{asset('/public/assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<!-- Style css -->
  <link href="{{asset('/public/assets/css/admin.css')}}" rel="stylesheet">
	
</head>
<body>
  <!--*******************
      Preloader start
  ********************-->
  <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
  </div>
  <!--*******************
      Preloader end
  ********************-->

  {{-- Main Content --}}
  <div id="main-wrapper">

    {{-- Header Start --}}
		@include('back.header')
		{{-- End Header --}}

		{{-- Header Sidebar --}}
		@include('back.sidebar')
		{{-- End Sidebar --}}

		{{-- Content Start --}}
		@yield('content')
		{{-- End Content --}}

    {{-- Footer Start --}}
		@include('back.footer')
		{{-- End Footer --}}

	<div>
  {{-- End Main Content --}}

  <!--**********************************
      Scripts
  ***********************************-->
  <!-- Required vendors -->
  <script src="{{asset('/public/assets/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('/public/assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{asset('/public/assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
	
	<!-- Apex Chart -->
	<script src="{{asset('/public/assets/vendor/apexchart/apexchart.js')}}"></script>
	
	<script src="{{asset('/public/assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	
	<!-- Chart piety plugin files -->
  <script src="{{asset('/public/assets/vendor/peity/jquery.peity.min.js')}}"></script>
	<!-- Dashboard 1 -->
	<script src="{{asset('/public/assets/js/dashboard/dashboard-1.js')}}"></script>
	
	<script src="{{asset('/public/assets/vendor/owl-carousel/owl.carousel.js')}}"></script>
	<script src="{{asset('/public/assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
	 <!-- Datatable -->
	<script src="{{asset('/public/assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('/public/assets/js/plugins-init/datatables.init.js')}}"></script>
	<script src="{{asset('/public/assets/js/plugins-init/sweetalert.init.js')}}"></script>
  <script src="{{asset('/public/assets/js/custom.min.js')}}"></script>
	<script src="{{asset('/public/assets/js/dlabnav-init.js')}}"></script>
	<script src="{{asset('/public/assets/js/demo.js')}}"></script>
  <script src="{{asset('/public/assets/js/styleSwitcher.js')}}"></script>
	<script>
		function cardsCenter()
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:true,
				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: true,
				navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},	
					800:{
						items:1
					},			
					991:{
						items:1
					},
					1200:{
						items:1
					},
					1600:{
						items:1
					}
				}
			})
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000); 
		});
		jQuery(document).ready(function(){
			setTimeout(function(){
				dlabSettingsOptions.version = 'dark';
				new dlabSettings(dlabSettingsOptions);
			},1500)
		});
	</script>
</body>
</html>