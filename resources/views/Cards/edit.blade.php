<div class="row justify-content-between">
    <div class="card col-sm-12 col-md-12 col-lg-7 col-xl-7" id="FormModal">
        <div class="col-sm-12">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Create Keypl</h4>
            <button type="button" class="close" onclick="Cards.close()">&times;</button>
          </div>
   
          <!-- Modal body -->
          <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#General">General</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#styleK">Style</a>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div id="General" class="container tab-pane active"><br>
                      @foreach($cardItems as $ci)
                        <button type="button" class="btn {{$ci['item']->style}} btn-block"   onclick="$('#div-{{$ci['card_detail']->id}}').slideToggle('slow');" ><h2>{{$ci['item']->name}} <i class="{{$ci['item']->icon}}"></i></h2></button>
                          <div class="col-sm-12" style="display:none" id="div-{{$ci['card_detail']->id}}">
                          <br>
                          @include('Cards.itemsUpdate.TypeForms.form'.$ci['item']->id,['data' => $ci['card_detail']])
                        </div>
                        <br>
                      @endforeach
                  </div>
                  <div id="styleK" class="container tab-pane fade"><br>
                        @include('Cards.itemsUpdate.cardForm')
                  </div>
                </div>
          </div>
  
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-success btn-save" onclick="Cards.prev()">Preview <i
              class='fas fa-plus'></i></button>
            <button type="button" class="btn btn-success btn-save" onclick="Cards.save('update',{{$data['id']}})">Update <i
                class='fas fa-plus'></i></button>
            <button type="button" class="btn btn-danger" onclick="Cards.close()" >Cancel <i
                class='fas fa-window-close'></i></button>
          </div>
  
        </div>
    </div>
    <div class="col-sm-4 all-screen mx-auto d-block">
           <div class="card device-case">
              <div class="mobile-screen" id="mobil-vition" style="background-image: url({{$actual_bg}})">
                @include('Cards.itemsUpdate.keypl')
              </div>
              <div class="mobile-screen-loadig bg-warning" id="loading-mobil-vition" style="display:none">
                  <div class="container text-center">
                    <br><br>
                    <div class="spinner-grow text-dark"></div>
                    <div class="spinner-grow text-dark"></div>
                    <div class="spinner-grow text-dark"></div>
                  </div>
              </div>
           </div>
    </div>
  </div>
  