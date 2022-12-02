<!doctype html>
<html lang="en">
	<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="dashboard template, bootstrap admin template, bootstrap admin template, admin template, bootstrap dashboard, html template, css templates, bootstrap form template, bootstrap 4 templates, bootstrap dashboard template, admin dashboard template, html dashboard template, bootstrap grid template, html admin template, bootstrap 4 admin template, bootstrap 4 dashboard, bootstrap admin, admin dashboard, html and css templates, themeforest html, themeforest html templates, template html5 bootstrap"/>

		<!-- Favicon -->
		<link rel="icon" href="{{asset('admin/assets/images/brand/favicon.ico')}}" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/images/brand/favicon.ico')}}" />

		<!-- Title -->
		<title>@yield('title')</title>

		<!-- Bootstrap css -->
		<link href="{{asset('admin/assets/plugins/bootstrap-4.3.1/css/bootstrap.min.css')}}" rel="stylesheet" />

		<!-- Sidemenu Css -->
		<link href="{{asset('admin/assets/css/sidemenu.css')}}" rel="stylesheet" />

		<!-- Dashboard Css -->
		<link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" />
		<link href="{{asset('admin/assets/css/admin-custom.css')}}" rel="stylesheet" />

		<!-- c3.js Charts Plugin -->
		<link href="{{asset('admin/assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet" />

		<!-- p-scroll bar css-->
		<link href="{{asset('admin/assets/plugins/pscrollbar/pscrollbar.css')}}" rel="stylesheet" />

		<!---Font icons-->
		<link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet"/>

		<!---P-scroll Bar css -->
		<link href="{{asset('admin/assets/plugins/pscrollbar/pscrollbar.css')}}" rel="stylesheet"/>
		<!-- Color Skin css -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('admin/assets/color-skins/color6.css')}}" />
        <link href="{{asset('admin/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('admin/assets/plugins/datatable/jquery.dataTables.min.css')}}" rel="stylesheet" />


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


        @yield('style')

	</head>

	<body class="app sidebar-mini">

		<!--Loader-->
		<div id="global-loader">
			<img src="../assets/images/loader.svg" class="loader-img" alt="">
		</div>
		<!--/Loader-->

		<!--Page-->
		<div class="page">
			<div class="page-main h-100">

				<!--App-Header-->
				 @include('admin.partials.header')
				<!--/App-Header-->

				<!-- Sidebar menu-->
				@include('admin.partials.sidebar')
				<!-- /Sidebar menu-->
                   @yield('content')
				<!--App-Content-->

            </div>

			<!--Footer-->
			    @include('admin.partials.footer')npm
			<!--/Footer-->

		</div>
         @yield('script')
		<!-- Back to top -->
		<a href="#top" id="back-to-top" ><i class="fa fa-long-arrow-up"></i></a>

		<!-- JQuery js-->
		<script src="{{asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>

		<!-- Bootstrap js -->
		<script src="{{asset('admin/assets/plugins/bootstrap-4.3.1/js/popper.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/bootstrap-4.3.1/js/bootstrap.min.js')}}"></script>

		<!--JQuery Sparkline Js-->
		<script src="{{asset('admin/assets/js/jquery.sparkline.min.js')}}"></script>

		<!-- Circle Progress Js-->
		<script src="{{asset('admin/assets/js/circle-progress.min.js')}}"></script>

		<!-- Star Rating Js-->
		<script src="{{asset('admin/assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!-- Fullside-menu Js-->
		<script src="{{asset('admin/assets/plugins/sidemenu/sidemenu.js')}}"></script>

		<!-- p-scroll bar Js-->
		<script src="{{asset('admin/assets/plugins/pscrollbar/pscrollbar.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/pscrollbar/pscroll.js')}}"></script>

		<!--Counters -->
		<script src="{{asset('admin/assets/plugins/counters/counterup.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/counters/waypoints.min.js')}}"></script>

		<!-- CHARTJS CHART -->
		<script src="{{asset('admin/assets/plugins/chart/chart.bundle.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/chart/utils.js"')}}"></script>

		<!-- ECharts Plugin -->
		<script src="{{asset('admin/assets/plugins/echarts/echarts.js')}}"></script>
		<script src="{{asset('admin/assets/js/index1.js')}}"></script>


		<!-- Custom Js-->
		<script src="{{asset('admin/assets/js/admin-custom.js')}}"></script>

        <script src="{{asset('admin/assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/datatable.js')}}"></script>

	</body>
</html>
