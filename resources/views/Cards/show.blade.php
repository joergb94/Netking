<div class="modal fade" id="FormModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Devices</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <ul class="list-group">
          <li class="list-group-item head-biopy">
            <div class="row col-sm-12 col-xs-12 text-center">
              <div class="col-sm-4 col-xs-12">#</div>
              <div class="col-sm-4 col-xs-12">Code</div>
              <div class="col-sm-4 col-xs-12">Device</div>
              <!--<th scope="col">Opciones</th>-->
            </div>
          </li>
          <ul class="list-group ">
            <li class="list-group-item">
              @forelse($data as $products)
              <div class="row table table-bordered">
                <div class="col-sm-4">{{$products['id']}}</div>
                <div class="col-sm-4">{{$products['code']}}</div>
                <div class="col-sm-4">{{$products['name']}}</div>
                <!--<td><a href="">Ver Producto</a></td>-->
              </div>
              @empty
              <div colspan="3" class="text-center no-data">
                <h1 class="text-info">No data</h1>
              </div>
              @endforelse
          </ul>
          </li>
        </ul>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel <i
            class='fas fa-window-close'></i></button>
      </div>

    </div>
  </div>
</div>