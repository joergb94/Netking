
<div class="row justify-content-between">
  <div class="card col-sm-12" id="FormModal">
      <div class="col-sm-12">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Keypl</h4>
          <a href="/myKepls" class="close"> &times;</a>
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

        <!-- Modal footer -->
        <div class="modal-footer">
              <a href="/myKepls" class="btn btn-danger">Cancel <i class='fas fa-window-close'></i></a>
        </div>

      </div>
  </div>
</div>
