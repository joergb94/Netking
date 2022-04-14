<div class="col-12" >
  <div class="">
    <div class="modal-content">
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
