  <!-- The Modal -->
  <div class="modal" id="myModalBloque">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Agregar Bloque</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row justify-content-between">
                 @foreach($items as $item)
                    <div class="col-4">
                        <br>
                        <button type="button" onclick="Cards.add_item('{{$item->id}}')" class="btn {{$item->style}} btn-div text-center ">
                            <h1><i class="{{$item->icon}}"></i></h1>
                            <h3>{{$item->name}}</h3>
                        </button>
                        <br>
                    </div>
                 @endforeach
                 <input type="hidden" id="keypls_id" value="0">
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>