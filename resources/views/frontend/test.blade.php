<!DOCTYPE HTML>
<html lang="en">

<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<!-- Author -->
	<meta name="author" content="">
	<!-- description -->
	<meta name="description" content="">
	<!-- keywords -->
	<meta name="keywords" content="">
	<!-- Page Title -->

	<title>@yield('title')</title>

	<link rel="icon" href="{{asset('assets/vendor/images/favicon.ico')}}">
	<!-- Bundle -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
	<!-- Style Sheet -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">

    <link href="{{asset('admin/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/datatable/jquery.dataTables.min.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>


<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>


</head>

<body>

	<!-- Header -->

	<!-- Main Banner -->
    <form>
        <div class="form-group">
          <label for="sel1">Select list (select one):</label>
          <select class="form-control" id="sel1" style="width: 50%">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
          </select>
        </div>
      </form>
   	<!-- Call To Action -->
	<section class="call-to-action">
		<div class="container">
			<div class="row align-items-end">
				<div class="col-xl-9 col-lg-8 col-md-12">
					<p>Make a call or fill form</p>
					<h2>Call our agent to get a quote</h2>
				</div>
				<div class="col-xl-3 col-lg-4 col-md-12">
					<a href="{{url('schedule-trips')}}">Book Bus Now</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<!-- JavaScript -->
	<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('assets/js/parallaxie.js')}}"></script>
	<script src="{{asset('assets/js/function.js')}}"></script>

    {{-- <script>
    $('.modal').on('hidden.bs.modal', function (e) {
        setTimeout(function(){$('[data-target=".login-form"]').blur();}, 10);
    });
    function mouseenter() {
        document.getElementById("EMAIL").style.color = "red";
        }

    function mouseleave() {
        document.getElementById("EMAIL").style.color = "white";
        }
    </script> --}}

</body>

</html>
