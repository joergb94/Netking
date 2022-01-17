
<div class="row justify-content-between">
  <div class="card col-sm-7" id="FormModal">
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
                    <a class="nav-link active" data-toggle="tab" href="#General">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#styleK">Menu 1</a>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div id="General" class="container tab-pane active"><br>
                      @foreach($cardItems as $ci)
                        <button type="button" class="btn btn-primary btn-block"   onclick="$('#div-{{$ci->id}}').slideToggle('slow');" >{{$ci->name}}</button>
                          <div class="col-sm-12" style="display:none" id="div-{{$ci->id}}">
                          <br>
                          @include('Cards.itemsUpdate.TypeForms.form'.$ci->id,['data' => $ci])
                        </div>
                        <br>
                      @endforeach
                  </div>
                  <div id="styleK" class="container tab-pane fade"><br>
                        @include('Cards.itemsCreate.cardForm')
                  </div>
                </div>
          
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success btn-save" onclick="Cards.prev()">Preview <i
            class='fas fa-plus'></i></button>
          <button type="button" class="btn btn-success btn-save" onclick="Cards.save('add')">Create <i
              class='fas fa-plus'></i></button>
          <button type="button" class="btn btn-danger" onclick="Cards.close()" >Cancel <i
              class='fas fa-window-close'></i></button>
        </div>

      </div>
  </div>
  <div class="col-sm-4 all-screen">
         <div class="card device-case">
            <div class="mobile-screen" id="mobil-vition">
            @include('Cards.itemsCreate.keypl')
            </div>
         </div>
  </div>
</div>
