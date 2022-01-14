<div class="modal fade" id="FormModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
          @forelse ($memberships as $membership)
          <div class="col-sm-4">
          <div class="card">
            <div class="card-header">
              {{$membership->membership}}
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p>{!!$membership->description !!}</p>
                <footer class="blockquote-footer">Cantidad de tarjetas: {{$membership->quantity}} </footer>
              </blockquote>
            </div>
            <div class="card-footer">
                @if ($membership->id == 2)
                <button type="button" class="btn btn-success" onclick="Profile.purchase_extra({{$membership->id}})">Comprar membresia <i
                    class='fas fa-window-close'></i></button>
                @else
                <button type="button" class="btn btn-success" onclick="Profile.purchase({{$membership->id}})">Comprar membresia <i
                    class='fas fa-window-close'></i></button>
                @endif
              </div>
          </div>
          </div>
          @empty
              
          @endforelse
        </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i
              class='fas fa-window-close'></i></button>
        </div>
  
      </div>
    </div>
  </div>