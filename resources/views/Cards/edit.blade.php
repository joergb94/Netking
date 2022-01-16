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
            @foreach($cardItems as $ci)
              <button type="button" class="btn btn-primary btn-block">Full-Width Button</button>
              <div class="col-sm-12" id="">
                 @include('Cards.itemsUpdate.TypeForms.form{{$ci->id}}')
              </div>
            @endforeach
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
           </div>
    </div>
  </div>
  