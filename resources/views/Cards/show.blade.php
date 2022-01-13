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
        <div class="col-sm-12">
        <div style="text-align: center">
          <h2>About me</h2>
          <p>{{$card['card_user_details']['about_me']}}</p>
        </div>
      </div>
      <div class="col-sm-12">
        <div style="text-align: center">
          <h2>Phone</h2>
          <p>{{$card['card_user_details']['phone']}}</p>
        </div>
      </div>
      <div class="col-sm-12">
        <div style="text-align: center">
          <h2>Cell Phone</h2>
          <p>{{$card['card_user_details']['cell_phone']}}</p>
        </div>
      </div>
      <div class="col-sm-12">
        <div style="text-align: center">
          <h2>Business</h2>
          <p>{{$card['card_user_details']['bsiness']}}</p>
        </div>
      </div>
      <div class="col-sm-12">
        <div style="text-align: center">
          <h2>Scolarship</h2>
          <p>{{$card['card_user_details']['scholarship']}}</p>
        </div>
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