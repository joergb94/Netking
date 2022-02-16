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

<style>
    ::-webkit-scrollbar {
        width: 5px;
    }
 
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: {!!$data['color']!!};
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: {!!$data['color']!!}; 
    }
        body, html  {
            @if($card_style['background_color'] == 1)
                /* The color used */
                background-color: {!!$data["background_image_color"]!!};
             
            @else
                /* The image used */
                background-image: url('{{$actual_bg}}');
            @endif
            /* Full height */
            height: 100vh;
            width: 100%; 
            overflow-y: scroll;
            
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

            color: white;
            font-weight: bold;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            padding: 20px;
            text-align: center;
            }
    }

</style>

<body>
    <div class="bg-image"></div>
    <div class="col-sm-12 col-md-12 col-lg-4 mx-auto d-block bg">
        <div class="col-12">
            @include('Keypls.itemsUpdate.themes.theme'.$data['themes_id'])
        </div>
    </div>
    <input id="baseUrl" type="hidden" value="{{ \Request::root() }}">
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('js/MasterAjax.js') }}"></script>
<script>
    const Cards = {
 
        send_email:function(id){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var baseUrl = $('#baseUrl').val();
            var form = $("#keypls-fom-"+id).serialize();
            $.ajax({
                type: "GET",
                url: baseUrl+'/contactUs/'+id,
                data: form,
                success: function (data) {
                messages({title:'Listo!',text:'Correo Enviado',type:'success'});
                location.reload();
                },
                error: function (data) {
                console.log(data);

                }
            });
        },

}
</script>
</html>