<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Azzara Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>

	<script src="https://kit.fontawesome.com/7267d16efc.js" crossorigin="anonymous"></script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-social.css') }}">
	
	<link rel="stylesheet" href="{{ asset('assets/css/azzara.min.css') }}">
    <!--mini-preview -->
    <link rel="{{ asset('assets/js/plugin/linkpreview/jquery.minipreview.css') }}"></link>

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IBM+Plex+Sans:wght@300&family=Island+Moments&family=M+PLUS+1p&family=Playfair+Display:ital@1&family=Pushster&family=Roboto+Mono:wght@200&family=Roboto:wght@100&family=Shizuru&display=swap" rel="stylesheet">

    @include('Keypls.itemsUpdate.stylek.css')
<body id="app">
    <div class="bg-image"></div>
    <div class="col-sm-12 col-md-12 col-lg-4 mx-auto d-block bg">
        <div class="col-12">
            @include('Keypls.itemsUpdate.themes.theme'.$data['themes_id'])
        </div>
    </div>
    <input id="baseUrl" type="hidden" value="{{ \Request::root() }}">
    <input id="url" type="hidden" value="{{ \Request::url() }}">
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('js/MasterAjax.js') }}"></script>
<script src="{{ asset('js/actions/Keypl.js') }}"></script>
</html>