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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-social.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/azzara.css') }}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IBM+Plex+Sans:wght@300&family=Island+Moments&family=M+PLUS+1p&family=Playfair+Display:ital@1&family=Pushster&family=Roboto+Mono:wght@200&family=Roboto:wght@100&family=Shizuru&display=swap" rel="stylesheet">

</head>
<body id="app">
<div class="wrapper">
<div class="page-inner">
<div class="bg-search-keypls col-12 text-center">
<img src='{{(Auth::user()->image)?Auth::user()->path.Auth::user()->image:asset("img/profile.jpg")}}' alt="image profile" class="img-my-keypls">
    <h1>{{Auth::user()->name}} {{Auth::user()->last_name}}</h1>
</div>
@include('Cards.chart2')
<!--card-->


<!-- show_blade -->
<div id="show_blade" style="display:none">
  <div id="card_show"></div>
</div>
</div>
<!-- Passing BASE URL to AJAX -->
<input id="url" type="hidden" value="{{ \Request::url() }}">
<input id="baseUrl" type="hidden" value="{{ \Request::root() }}">
<a href="javascript:0" id="return-to-top"><i class="fas fa-chevron-up"></i></a>


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
<script src="{{asset('js/chart.min.js')}}"></script>
  <script src="{{asset('js/actions/Cards.js')}}"></script>
  <script>
  get_data_keypls();

  function get_data_keypls(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: "GET",
      url: 'http://192.168.1.103:8001/api/keypl/metrics/data/json?id={{Auth::user()->id}}',
      success: function (data) {

        data.forEach((dato, index) => {
          console.log(dato.graphics.day.data)
                        graphics(dato.card.id,'D',dato.graphics.day);
                        graphics(dato.card.id,'W',dato.graphics.week);
                        graphics(dato.card.id,'M',dato.graphics.month);
                        graphics(dato.card.id,'Y',dato.graphics.year);
                        graphics(dato.card.id,'A',dato.graphics.all);
               
              });
      },
      error: function (data) {
        console.log('Error:', data.responseText);
    
      }
    });
  }
  function graphics(id,letter,data) {
    var ctx = document.getElementById("myChart"+letter+id).getContext('2d');
            var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: data.labels,
                                        datasets: [{
                                            label: data.title, // Name the series
                                            data: data.data, // Specify the data values array
                                            fill: false,
                                            borderColor: '#000000', // Add custom color border (Line)
                                            backgroundColor: '#000000', // Add custom color background (Points and Fill)
                                            borderWidth: 3,// Specify bar border width
                                            tension:0.4,
                                            pointRadius:0,
                                        }]},
                                    options: {
                                      plugins:{
                                        legend:{
                                          display:false
                                        }
                                      },
                                      scales: {
                                          x: {
                                              grid: {
                                                 display:false
                                              },
                                          },
                                          y: {
                                              grid: {
                                                drawBorder: false,
                                                 display:false
                                              },
                                              ticks:{
                                                beginAtZero: true,
                                                display:false
                                              }  
                                          }
                                          
                                      },
                                      responsive: true, // Instruct chart js to respond nicely.
                                      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
                                    }
                                });
  }
   
  
</script>
</body>
</html>