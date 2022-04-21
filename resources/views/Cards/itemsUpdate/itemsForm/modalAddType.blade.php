<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Item</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

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
</div>