<div class="col-12" >
  <div class="card">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
            <button type="button" class="btn btn-danger btn-circle top-right" onclick="Cards.close()" >
              <i class='fas fa-window-close'></i>
            </button>
            <h4 class="modal-title">QR Keypl <i class="fas fa-chart-line"></i></h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        @foreach($data as $keypl)
          <div class="col-12 bg-graphics-keypls text-center div-rounded padding-graphics">
            <h2>{{$keypl['card']['title']}}</h2>
            <p>{{$keypl['card']['subtitle']}}</p>
            <!-- Tab panes -->
   
              <div class="tab-content col-12">
                <div class="tab-pane no-borders  container active" id="D{{$keypl['card']['id']}}"><canvas id="myChartD{{$keypl['card']['id']}}"></canvas></div>
                <div class="tab-pane no-borders container fade" id="W{{$keypl['card']['id']}}"><canvas id="myChartW{{$keypl['card']['id']}}"></canvas></div>
                <div class="tab-pane no-borders container fade" id="M{{$keypl['card']['id']}}"><canvas id="myChartM{{$keypl['card']['id']}}"></canvas></div>
                <div class="tab-pane no-borders container fade" id="Y{{$keypl['card']['id']}}"><canvas id="myChartY{{$keypl['card']['id']}}"></canvas></div>
                <div class="tab-pane no-borders container fade" id="A{{$keypl['card']['id']}}"><canvas id="myChartA{{$keypl['card']['id']}}"></canvas></div>
              </div>
 
        
            <ul class="nav justify-content-center">
              <li class="nav-item">
                <a class="nav-link btn-graph-keypl btn-sm active" data-toggle="tab" href="#D{{$keypl['card']['id']}}">24h</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-graph-keypl btn-sm" data-toggle="tab" href="#W{{$keypl['card']['id']}}">1W</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-graph-keypl btn-sm" data-toggle="tab" href="#M{{$keypl['card']['id']}}">1M</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-graph-keypl btn-sm" data-toggle="tab" href="#Y{{$keypl['card']['id']}}">1Y</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-graph-keypl btn-sm" data-toggle="tab" href="#A{{$keypl['card']['id']}}">All</a>
              </li>
            </ul>

             
          </div>
        @endforeach
      </div>

    </div>
  </div>
</div>
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
      url: url+'/get_graphics',
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