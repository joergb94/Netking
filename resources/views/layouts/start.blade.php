<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Welcome To Keypls</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>

	<script src="https://kit.fontawesome.com/7267d16efc.js" crossorigin="anonymous"></script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-social.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/azzara.css') }}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IBM+Plex+Sans:wght@300&family=Island+Moments&family=M+PLUS+1p&family=Playfair+Display:ital@1&family=Pushster&family=Roboto+Mono:wght@200&family=Roboto:wght@100&family=Shizuru&display=swap" rel="stylesheet">
	@laravelPWA
	@yield('style')
</head>
<body id="app" class="bg-white">
	<div id="main-keypl" style="display:none">
		@yield('content')
		@yield('modal')
	</div>
	<div id="loading-splash">
			<img src="{{ asset('img/splash.png') }}" class="img-fluid centered-btn">
	</div>
<a href="javascript:0" id="return-to-top"><i class="fas fa-chevron-up"></i></a>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/qrcode.js')}}"></script>
<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<!-- jQuery UI -->
<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Moment JS -->
<script src="{{ asset('assets/js/plugin/moment/moment.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- Bootstrap Toggle -->
<script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

<!-- Google Maps Plugin -->
<script src="{{ asset('assets/js/plugin/gmaps/gmaps.js') }}"></script>
<script src="{{ asset('assets/js/plugin/gmaps/gmaps.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>

<!-- Azzara JS -->
<script src="{{ asset('assets/js/ready.min.js') }}"></script>
<script src="{{ asset('js/MasterAjax.js') }}"></script>

<!-- colorPlug in -->
<script src="{{asset('js/jscolor.js')}}"></script>
<script>
	const myTimeout = setTimeout(myGreeting, 1000);

	function myGreeting() {
		$("#loading-splash").hide();
		$("#main-keypl").show();
	}
</script>
@yield('js')
</body>
</html>