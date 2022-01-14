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

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IBM+Plex+Sans:wght@300&family=Island+Moments&family=M+PLUS+1p&family=Playfair+Display:ital@1&family=Pushster&family=Roboto+Mono:wght@200&family=Roboto:wght@100&family=Shizuru&display=swap" rel="stylesheet">

</head>

<style>
    body, html {
            
        height: 100vh;
        width: 100%; 
        overflow-y: scroll;
    }
    ::-webkit-scrollbar {
        width: 10px;
    }


 
/* Handle */
::-webkit-scrollbar-thumb {
    background: {!!$data['color']!!};
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: {!!$data['color']!!}; 
}
@media only screen and (max-width:  768px) {
    body, html  {
        /* The image used */
        background-image: url('{{$actual_bg}}');

        /* Full height */
         height: 100vh;
        
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
.bg-image {
    display:none;
}

@media only screen and (min-width:  768px) {
    
    .bg-image {
        /* The image used */
        background-image: url('{{$actual_bg}}');
        display:block;
        /* Add the blur effect */
        filter: blur(10px);
        -webkit-filter: blur(10px);
        
        /* Full height */
        height: 100%; 

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        }
}
.bg { 
        height: 100%;
    }
@media only screen and (min-width:  768px) {
    .bg {
        /* The image used */
        background-image: url('{{$actual_bg}}');
        overflow-y: scroll;
        /* Full height */
        height: 100%;
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
        width: 80%;
        padding: 20px;
        text-align: center;
        }
}
</style>

<body>
    <div class="bg-image"></div>
    <div class="col-sm-12 col-md-12 col-lg-4 mx-auto d-block bg">
            <br>
            <div class="col-sm-12">
                <div class="row justify-content-between">
                    <div class="{{($card_style['head_orientation'] == 1)?'col-4':'col-12'}} text-center" id="contend-image">
                        <img src="{{(isset($data['img_name']))? $data['img_path'].$data['img_name']:'https://www.w3schools.com/bootstrap4/cinqueterre.jpg'}}" class="{{$card_style['shape_image']?'rounded-circle':'rounded'}}" alt="Cinque Terre" width="100px" height="100px" id="imageProfile"> 
                    </div>
                    <div class="{{($card_style['head_orientation'] == 1)?'col-8':'col-12'}} text-center" id="contend-title">
                        <br>
                        <div class="col-12" id='content-title'>
                            @if($data['large_text'])
                                <h1 class="text-color" id="titlephone" style="color:{!!$data['color']!!}">@if(isset($data['title'])){{$data['title']}}@endif</h1>
                            @else
                                <h2 class="text-color" id="titlephone" style="color:{!!$data['color']!!}">@if(isset($data['title'])){{$data['title']}}@endif</h2>
                            @endif 
                        </div>
                        @if($data['large_text'])
                            <p class="text-color" id="namephone" style="color:{!!$data['color']!!}">{{$user['name']}}</p>
                        @else
                            <h2 class="text-color" id="namephone" style="color:{!!$data['color']!!}">{{$user['name']}}</h2>
                        @endif
                        
                        <h6 class="text-color" id="subephone" style="color:{!!$data['color']!!}">@if(isset($data['subtitle'])){{$data['subtitle']}}@endif</h6>
                    </div>
                
                </div>
            </div>
            <br>
            <div class="row justify-content-between">
                <div class="col-12 text-center mx-auto d-block" id="social">
                   @if (isset($data['card_network']))
                        @foreach ($data['card_network'] as $item)
                        <a class="btn btn-social-icon {{$item['social_network']['btn_network']}}" href="{{$item['url']}}">
                            <span class="{{$item['social_network']['icon']}}"></span>
                        </a>
                        @endforeach
                    @endif
                </div>
            </div> 
    </div>

    
   
</body>
</html>