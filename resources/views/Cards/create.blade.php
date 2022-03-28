
<div class="row justify-content-between">
  <div class="card col-sm-12" id="FormModal">
     
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Keypl</h4>
          <button type="button" class="btn btn-danger btn-circle top-right" onclick="Cards.close()" >
            <i class='fas fa-window-close'></i>
          </button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="col-12">
            <div class="row justify-content-center">
                @foreach($themes as  $theme)
                  @if($theme->id != 3)
                    <div class="col-4">
                      <div class="col-12 btn-outline-warning" onclick="Cards.create_card({{$theme->id}})">
                            <br>
                            <img class="img-fluid theme-keypl mx-auto d-block" src="{{ asset('images/'.$theme->image)}}" alt="{{$theme->name}}">
                            <br>
                      </div>
                    </div>
                  @endif
                @endforeach
              </div>
           </div>  
        </div>
  </div>
</div>
