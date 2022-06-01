<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sindh Jewellers</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="description">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('user/assets/images/Photo_1637504990619.png') }}" />
	<!-- Plugins CSS -->
	<link rel="stylesheet" href="{{ asset('user/assets/css/plugins.css') }}">
	<!-- Bootstap CSS -->
	<link rel="stylesheet" href="{{ asset('user//assets/css/bootstrap.min.css') }}">
	<!-- Main Style CSS -->
	<link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('user/assets/css/responsive.css') }}">

</head>
<body class="template-collection belle">
<div class="pageWrapper">
    @include('include.header')

	<div id="page-content">

		@if (Request::url() === url('/new_index'))
			@include('include.slider');    
		@endif

		@yield('content')
	
	</div>
	
	@include('include.footer')

</div>
	
	<script src="{{ asset('user/assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
 	<script src="{{ asset('user/assets/js/vendor/jquery.cookie.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/wow.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/instagram-feed.js') }}"></script>
     <!-- Including Javascript -->
    <script src="{{ asset('user/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('user/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/lazysizes.js') }}"></script>
    <script src="{{ asset('user/assets/js/main.js') }}"></script>

	@stack('script')
</body>
</html>