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
	<body class="" id="app">
		<div class="bg-image" ></div>
		<div id="keypl-content" style="display:none !important" class="col-sm-12 col-md-12 col-lg-4 mx-auto d-block bg bg-search-keypl">
			<div class="col-12 padding-keypl">
				@include('Keypls.itemsUpdate.themes.theme'.$data['themes_id'])
			</div>
		</div>
		
		<input id="baseUrl" type="hidden" value="{{ \Request::root() }}">
		<input id="url" type="hidden" value="{{ \Request::url() }}">
	


	<div id="content-player" class="no-margin"  >
			<iframe id="player"
					class="no-margin"
					style="width:100%; height: 100vh"
			 		src="https://www.youtube.com/embed/{{$presentation['name']}}?version=3&autoplay=1&modestbranding=1" 
					 title="YouTube video player" 
					 frameborder="0" 
					 allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen autoplay></iframe>
				<button class="btn btn-danger btn-block btn-update no-margin" onclick="video_hide()">Saltar <i class="fas fa-angle-right"></i></button>
		</div>
	</body>
<script>
	//this script on api for youtube excute play video 
	function onPlayerReady(event) {
		var embedCode = event.target.getVideoEmbedCode();
		event.target.playVideo();
		if (document.getElementById('player')) {
			document.getElementById('player').innerHTML = embedCode;
		}
	}


	function video_hide(){

		$("body").addClass("keypls-body");
		$("#content-player").remove();
		$("#keypl-content").show();
	}

</script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('js/MasterAjax.js') }}"></script>
<script src="{{ asset('js/actions/Keypl.js') }}"></script>
</html>