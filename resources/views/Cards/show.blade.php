<div class="modal fade" id="FormModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Details</h4>
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
              {{$card['card_user_details']}}
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