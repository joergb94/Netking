  <!-- The Modal -->
  <div id="addnew" class="tab-pane fade col-12">

      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Agregar Bloque</h4> 
          @include('Cards.itemsUpdate.itemsForm.buttonDevice')
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row justify-content-between">
                 @foreach($items as $item)
                    <div class="col-12 col-md-4">
                        <br>
                        <button type="button" onclick="Cards.add_item('{{$item->id}}')" class="btn {{$item->style}} btn-div text-center ">
                            <h1><i class="{{$item->icon}}"></i></h1>
                            <h3>{{$item->name}}</h3>
                        </button>
                    </div>
                 @endforeach
                 <input type="hidden" id="keypls_id" value="0">
            </div>
        </div>
      </div>
    </div>
