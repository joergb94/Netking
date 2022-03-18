
<div class="row justify-content-between">
    <div class="card col-sm-12 col-md-12 col-lg-7 col-xl-7" id="FormModal">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Keypl</h4>
            <button type="button" class="btn btn-danger btn-circle top-right" onclick="Cards.close()" >
              <i class='fas fa-window-close'></i>
            </button>
          </div>
   
          <!-- Modal body -->
          <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#General"  onclick="transactions.all_toggle()" >General</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#styleK"  onclick="transactions.all_toggle()" >Style</a>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content scroll">
                  <div id="General" class="container tab-pane active">
                      <div class="col-sm-12" id="contenedor-divs">
                          <br>
                          @foreach($cardItems as $ci)
                              <div class="btn-group col-sm-12" id="btn-group-{{$ci['card_detail']->id}}">
                                  <button type="button" class="btn {{$ci['item']->style}} btn-block"   onclick="transactions.toggle({{$ci['card_detail']->id}})" >
                                    <h2>{{$ci['item']->name}} <i class="{{$ci['item']->icon}}"></i></h2>
                                 </button>
                                <button type="button" class="btn {{$ci['item']->style}} delete" id="btn-delete-{{$ci['card_detail']->id}}" style="display:none"  onclick="Cards.delete_item({{$ci['card_detail']->id}},{{$data['id']}})"><i class="fa fa-trash"></i></button>
                              </div>
                              <div class="col-sm-12 divs-data" id="div-{{$ci['card_detail']->id}}" style="display:none">
                                <br class="br-">
                                @include('Cards.itemsUpdate.TypeForms.form'.$ci['item']->id,['data' => $ci['card_detail']])
                              </div>
                              <br class="br-{{$ci['card_detail']->id}}">
                          @endforeach 
                      </div>
                  </div>
                  <div id="styleK" class="container tab-pane fade"><br>
                        @include('Cards.itemsUpdate.cardForm')
                        <div id="loading-data-card" class="container text-center" style="display:none">
                          <br><br>
                          <div class="col-12">
                            <img class ="mx-auto d-block" src="{{asset('img/loading.png')}}" alt="load" width="100px" height="100px">
                          </div>
                          <div class="spinner-grow text-dark"></div>
                          <div class="spinner-grow text-dark"></div>
                          <div class="spinner-grow text-dark"></div>
                        </div>
                  </div>
                  <div class="col-sm-12"  style="display:none" >
                      <div id="qrcode" class="mx-auto d-block"></div>
                  </div>
                </div>
          </div>
    </div>
    <div class="col-sm-4 all-screen mx-auto d-block sticky">
    <button type="button" class="btn bg-keypl col-6 mx-auto d-block"    onclick="Cards.modal_item({{$data['id']}})"><h2>Agregar Bloque <i class="fa fa-plus"></i></h2></button>
           <div class="card device-case mx-auto d-block" id="case-mobile">
              @include('Cards.itemsUpdate.keypl')
           </div>    
    </div>
</div>
<script>
  QR.show({{$data['id']}});
</script>
